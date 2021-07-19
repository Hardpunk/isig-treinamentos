<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsletterDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateNewsletterRequest;
use App\Newsletter;
use App\Repositories\NewsletterRepository;
use Auth;
use Flash;
use Response;

class NewsletterController extends AppBaseController
{
    /** @var  NewsletterRepository */
    private $newsletterRepository;

    public function __construct(NewsletterRepository $newsletterRepo)
    {
        $this->newsletterRepository = $newsletterRepo;
    }

    /**
     * Display a listing of the Newsletter.
     *
     * @param  NewsletterDataTable  $newsletterDataTable
     * @return Response
     */
    public function index(NewsletterDataTable $newsletterDataTable)
    {
        $user = Auth::user();
        return $newsletterDataTable->render('newsletters.index', compact('user'));
    }

    /**
     * Store a newly created Newsletter in storage.
     *
     * @param  CreateNewsletterRequest  $request
     *
     * @return Response
     */
    public function store(CreateNewsletterRequest $request)
    {
        $input = $request->all();
        $email = $input['email'];

        if (!Newsletter::where('email', $email)->exists()) {
            $newsletter = $this->newsletterRepository->create($input);
        }

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'E-mail cadastrado com sucesso.']);
        }

        Flash::success('E-mail cadastrado com sucesso.');

        return redirect(route('admin.newsletters.index'));
    }

    /**
     * Remove the specified Newsletter from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error('E-mail não encontrado');

            return redirect(route('admin.newsletters.index'));
        }

        $this->newsletterRepository->delete($id);

        Flash::success('E-mail excluído com sucesso.');

        return redirect(route('admin.newsletters.index'));
    }
}
