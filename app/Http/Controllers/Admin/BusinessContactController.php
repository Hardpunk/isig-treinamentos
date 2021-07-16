<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BusinessContactDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessContactRequest;
use App\Http\Requests\UpdateBusinessContactRequest;
use App\Repositories\BusinessContactRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
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
        return $businessContactDataTable->render('business_contacts.index');
    }

    /**
     * Show the form for creating a new BusinessContact.
     *
     * @return Response
     */
    public function create()
    {
        return view('business_contacts.create');
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

        Flash::success('Business Contact saved successfully.');

        return redirect(route('businessContacts.index'));
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
        $businessContact = $this->businessContactRepository->find($id);

        if (empty($businessContact)) {
            Flash::error('Business Contact not found');

            return redirect(route('businessContacts.index'));
        }

        return view('business_contacts.show')->with('businessContact', $businessContact);
    }

    /**
     * Show the form for editing the specified BusinessContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessContact = $this->businessContactRepository->find($id);

        if (empty($businessContact)) {
            Flash::error('Business Contact not found');

            return redirect(route('businessContacts.index'));
        }

        return view('business_contacts.edit')->with('businessContact', $businessContact);
    }

    /**
     * Update the specified BusinessContact in storage.
     *
     * @param  int              $id
     * @param UpdateBusinessContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessContactRequest $request)
    {
        $businessContact = $this->businessContactRepository->find($id);

        if (empty($businessContact)) {
            Flash::error('Business Contact not found');

            return redirect(route('businessContacts.index'));
        }

        $businessContact = $this->businessContactRepository->update($request->all(), $id);

        Flash::success('Business Contact updated successfully.');

        return redirect(route('businessContacts.index'));
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
            Flash::error('Business Contact not found');

            return redirect(route('businessContacts.index'));
        }

        $this->businessContactRepository->delete($id);

        Flash::success('Business Contact deleted successfully.');

        return redirect(route('businessContacts.index'));
    }
}
