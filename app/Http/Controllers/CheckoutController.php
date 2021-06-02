<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\PaymentRequest;
use App\Mail\PaymentDone;
use App\Mail\PaymentWaiting;
use App\Payment;
use App\Trail;
use App\User;
use Auth;
use Carbon\Carbon;
use Cookie;
use DB;
use Exception;
use Illuminate\Http\Request;
use Mail;
use PagarMe\Client;
use Session;

class CheckoutController extends Controller
{
    const INDIVIDUAL = 'cpf';
    const BUSINESS = 'cnpj';

    /** @var \PagarMe\Client $pagarme */
    private $pagarme;

    /** @var \App\User $user */
    private $user;

    const CALLBACK_URL = 'https://www.inagroacademy.com/pagarme/callback';
    const COOKIE_EXPIRATION_TIME = (60 * 24 * 30);

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->pagarme = new Client(config('app.pagarme'));
            return $next($request);
        });
    }

    public function index()
    {
        $cart = [];
        $user = $this->user;
        $items = [];
        $valor_total = 0;

        if (Cookie::has('cart')) {
            $items = [];
            $valor_total = 0;
            $cart = json_decode(Cookie::get('cart'), true);
            if (count($cart) > 0) {
                foreach ($cart as $type => $cart_items) {
                    foreach ($cart_items as $cart_item) {
                        if ($type == 'trail') {
                            $item = Trail::find($cart_item, ['id', 'title', 'slug', 'old_price', 'price', 'discount', 'cover_details', 'cover']);
                            $item->price = round($item->price * (1 - ($item->discount / 100)), 2);
                        } else {
                            $item = Course::find($cart_item, ['id', 'title', 'slug', 'category_title', 'category_slug', 'old_price', 'price', 'image']);
                        }
                        $item->type = $type;
                        $item->title = mb_strtoupper($item->title);
                        $valor_total += $item->price;
                        $item->price = number_format($item->price, 2, ',', '.');
                        $items[] = $item;
                    }
                }
            }
        }

        return view('pages.checkout.index', compact('items', 'user', 'valor_total'));
    }

    public function payment(PaymentRequest $request)
    {
        try {
            $paymentData = $request->all();

            if ($paymentData['payment_method'] == 'credit_card') {
                $payment = $this->paymentCard($paymentData);
            } else {
                $payment = $this->paymentBankSlip($paymentData);
            }

            if ($payment->status != 'refused') {
                return redirect()
                    ->route('checkout.confirmation', ['order' => $payment->order_id])
                    ->withCookie(Cookie::forget('cart'));
            }
            return back();
        } catch (Exception $ex) {
            Session::flash('flash_message', 'Ocorreu um erro ao efetuar o pagamento.');
            Session::flash('flash_message_detail', $ex->getMessage());
            Session::flash('flash_type', 'danger');
            return back();
        }
    }

    public function confirmation($order)
    {
        $payment = Payment::where('order_id', $order)->first();
        if ($payment === null) {
            return redirect('/');
        }

        $payment->load('trails', 'courses');

        $items['trail'] = $payment->trails;
        $items['course'] = $payment->courses;

        return view('pages.checkout.confirmation', compact('items', 'payment'));
    }

    private function paymentCard($paymentData)
    {
        try {
            DB::beginTransaction();

            $customer = $this->getCustomer();
            $cartItems = $this->getCartItems();
            $cardExpirationDate = "{$paymentData['cc_expiry_month']}-{$paymentData['cc_expiry_year']}";
            $cardExpirationDateFormat = Carbon::createFromFormat('m-Y', $cardExpirationDate)->format('my');
            $orderId = $this->generateOrderId();

            $transaction = $this->pagarme->transactions()->create([
                'amount' => $cartItems['amount'],
                'async' => false,
                'payment_method' => $paymentData['payment_method'],
                'card_holder_name' => $paymentData['cc_holder'],
                'card_cvv' => $paymentData['cc_cvv'],
                'card_number' => $paymentData['cc_number'],
                'card_expiration_date' => $cardExpirationDateFormat,
                'customer' => $customer,
                'billing' => [
                    'name' => $this->user->name,
                    'address' => [
                        'country' => $paymentData['country'],
                        'street' => $paymentData['street'],
                        'street_number' => $paymentData['street_number'],
                        'state' => $paymentData['state'],
                        'city' => $paymentData['city'],
                        'neighborhood' => $paymentData['neighborhood'],
                        'zipcode' => only_numbers($paymentData['zipcode']),
                    ],
                ],
                'items' => $cartItems['items_transaction'],
                'reference_key' => $orderId,
                'installments' => $paymentData['cc_installments'],
                'postback_url' => self::CALLBACK_URL
            ]);

            if (!empty($transaction->errors)) {
                throw new Exception($transaction->errors[0]->message ?? 'Ocorreu um erro ao efetuar o pagamento! Tente novamente mais tarde.');
            }

            $dateCreated = Carbon::parse($transaction->date_created)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s');
            $dateUpdated = Carbon::parse($transaction->date_updated)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s');
            $paymentArray = [
                'user_id' => $this->user->id,
                'order_id' => $orderId,
                'external_id' => $transaction->id,
                'payment_method' => $paymentData['payment_method'],
                'amount' => ($cartItems['amount']/100),
                'installments' => $paymentData['cc_installments'],
                'card_brand' => $transaction->card_brand,
                'status' => $transaction->status,
                'refuse_reason' => $transaction->refuse_reason,
                'status_reason' => $transaction->status_reason,
                'date_created' => $dateCreated,
                'date_updated' => $dateUpdated,
            ];
            $payment = Payment::create($paymentArray);

            if ($transaction->status == 'paid') {
                $newUserId = 0;
                foreach ($cartItems['items'] as $item) {
                    $iped_user = [
                        'course_type' => 3,
                        'course_plan' => $item->type == 'trail' ? 3 : 1,
                        'user_id' => $newUserId,
                        'user_name' => $this->user->name,
                        'user_cpf' => $this->user->profile->document_number,
                        'user_email' => $this->user->email,
                        'user_password' => decrypt($this->user->profile->platform_password),
                        'user_country' => 34,
                        'user_cellphone' => $this->user->profile->phone,
                        'user_info' => $this->user->id,
                        'group_id' => env('IPED_GROUP'),
                    ];

                    if ($newUserId === 0) {
                        $iped_user['user_genre'] = $this->user->profile->sex == 'male' ? 1 : 0;
                    }

                    if ($item->type == 'trail') {
                        $courses = $item->courses->pluck('course_id')->toArray();
                        $iped_user['course_id'] = $courses;
                        $payment->trails()->attach($item->id);
                    } else {
                        $iped_user['course_id'] = $item->course_id;
                        $payment->courses()->attach($item->id);
                    }

                    $newUserId = $this->ipedUserRegistration($iped_user);
                }

                Mail::send(new PaymentDone($this->user));

            } else if ($transaction->status != 'refused') {
                Mail::send(new PaymentWaiting($this->user));
            } else {
                Session::flash('flash_message', 'Transação recusada, não autorizada.');
                Session::flash('flash_type', 'danger');
            }

            DB::commit();
            return $payment;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    private function paymentBankSlip($payment)
    {
        //
    }

    private function getCustomer()
    {
        $customer = $this->pagarme->customers()->get([
            'id' => $this->user->profile->external_id,
        ]);

        $customerArray = [
            'name' => $customer->name,
            'email' => $customer->email,
            'external_id' => $customer->external_id,
            'type' => $customer->type,
            'country' => $customer->country,
            'birthday' => $customer->birthday,
            'phone_numbers' => $customer->phone_numbers,
            'documents' => [
                [
                    'type' => $customer->document_type,
                    'number' => $customer->documents[0]->number
                ]
            ],
        ];

        return $customerArray;
    }

    private function getCartItems()
    {
        $items = [];
        $itemsTransaction = [];
        $valor_total = 0;

        if (Cookie::has('cart')) {
            $cart = json_decode(Cookie::get('cart'), true);
            if (count($cart) > 0) {
                foreach ($cart as $type => $cart_items) {
                    foreach ($cart_items as $cart_item) {
                        if ($type == 'trail') {
                            $item = Trail::find($cart_item, ['id', 'title', 'price', 'discount']);
                            $item->price = round($item->price * (1 - ($item->discount / 100)), 2);
                            $item->title = "Trilha do conhecimento - {$item->title}";
                        } else {
                            $item = Course::find($cart_item, ['id', 'course_id', 'title', 'price']);
                        }
                        $item->type = $type;
                        $valor_total += $item->price;
                        $itemsTransaction[] = [
                            'id' => strval($item->id),
                            'title' => $item->title,
                            'unit_price' => intval($item->price * 100),
                            'quantity' => 1,
                            'tangible' => false,
                        ];
                        $items[] = $item;
                    }
                }
            }
        }

        return [
            'amount' => intval($valor_total * 100),
            'items_transaction' => $itemsTransaction,
            'items' => $items
        ];
    }

    private function generateOrderId()
    {
        $paymentsToday = Payment::whereDate('created_at', '=', date('Y-m-d'))->count();
        $orderId = date('Ym') . mt_rand(100000, 999999) . '-' . ($paymentsToday + 1);

        while (DB::table('payments')->where('order_id', $orderId)->exists()) {
            $orderId = date('Ym') . mt_rand(100000, 999999) . '-' . ($paymentsToday + 1);
        }

        return $orderId;
    }

    private function ipedUserRegistration($userData)
    {
        $iped = new IpedAPIController();
        $iped_user_response = $iped->user_registration($userData);

        if (isset($iped_user_response->STATE) && ($iped_user_response->STATE == 1 || $iped_user_response->STATE == 2)) {
            $newUserId = $iped_user_response->REGISTRATION->user_id;
            $this->user->profile->user_token = $iped_user_response->REGISTRATION->user_data[0]->user_token;
            $this->user->profile->platform_user_id = $newUserId;
            $this->user->profile->save();
        } else {
            throw new Exception($iped_user_response->ERROR);
        }

        return $newUserId;
    }

    private function getPaymentStatusMessage($status)
    {
        switch ($status) {
            case '1':
            case 'CREATED':
                $message = 'Iniciado';
                break;
            case '2':
            case 'WAITING PAYMENT':
                $message = 'Boleto Impresso';
                break;
            case '3':
            case 'CANCELED':
                $message = 'Cancelado';
                break;
            case '4':
            case 'IN ANALISYS':
                $message = 'Em análise';
                break;
            case '5':
            case 'PRE AUTHORIZED':
                $message = 'Pré-Autorizado';
                break;
            case '6':
            case 'PARTIAL CAPTURED':
                $message = 'Autorizado Valor Parcial';
                break;
            case '7':
            case 'DECLINED':
                $message = 'Recusado';
                break;
            case '8':
            case 'CAPTURED':
                $message = 'Aprovado e Capturado';
                break;
            case '9':
            case 'CHARGEDBACK':
                $message = 'Chargeback';
                break;
            case '10':
            case 'IN DISPUTE':
                $message = 'Em Disputa';
                break;
            default:
                $message = '';
                break;
        }

        return $message;
    }

}
