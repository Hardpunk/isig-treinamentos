<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BusinessContactDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateBusinessContactRequest;
use App\Repositories\BusinessContactRepository;
use Auth;
use Flash;
use Response;

class BusinessContactController extends AppBaseController
{
    /** @var  BusinessContactRepository */
    private $businessContactRepository;

    public function __construct(BusinessContactRepository $businessContactRepo)
    {
        $this->businessContactRepository = $businessContactRepo;
    }

    /**
     * Display a listing of the BusinessContact.
     *
     * @param BusinessContactDataTable $businessContactDataTable
     * @return Response
     */
    public function index(BusinessContactDataTable $businessContactDataTable)
    {
        $user = Auth::user();
        return $businessContactDataTable->render('business_contacts.index', compact('user'));
    }

    /**
     * Store a newly created BusinessContact in storage.
     *
     * @param CreateBusinessContactRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessContactRequest $request)
    {
        $input = $request->all();

        $businessContact = $this->businessContactRepository->create($input);

        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'Contato enviado com sucesso.']);
        }

        Flash::success('Contato salvo com sucesso.');
        return redirect(route('admin.contactsBusiness.index'));
    }

    /**
     * Display the specified BusinessContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $businessContact = $this->businessContactRepository->find($id);

        if (empty($businessContact)) {
            Flash::error('Contato não encontrado.');

            return redirect(route('admin.contactsBusiness.index'));
        }

        return view('business_contacts.show', compact('businessContact', 'user'));
    }

    /**
     * Remove the specified BusinessContact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessContact = $this->businessContactRepository->find($id);

        if (empty($businessContact)) {
            Flash::error('Contato não encontrado');

            return redirect(route('admin.contactsBusiness.index'));
        }

        $this->businessContactRepository->delete($id);

        Flash::success('Contato excluído com sucesso.');

        return redirect(route('admin.contactsBusiness.index'));
    }
}
