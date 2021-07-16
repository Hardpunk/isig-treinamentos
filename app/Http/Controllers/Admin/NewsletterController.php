<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NewsletterDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;
use App\Repositories\NewsletterRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Auth;
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
     * Show the form for creating a new Newsletter.
     *
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('newsletters.create', compact('user'));
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

        $newsletter = $this->newsletterRepository->create($input);

        Flash::success('Newsletter saved successfully.');

        return redirect(route('admin.newsletters.index'));
    }

    /**
     * Display the specified Newsletter.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error('Newsletter not found');

            return redirect(route('admin.newsletters.index'));
        }

        return view('newsletters.show', compact('newsletter', 'user'));
    }

    /**
     * Show the form for editing the specified Newsletter.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error('Newsletter not found');

            return redirect(route('admin.newsletters.index'));
        }

        return view('newsletters.edit')->with('newsletter', $newsletter);
    }

    /**
     * Update the specified Newsletter in storage.
     *
     * @param  int  $id
     * @param  UpdateNewsletterRequest  $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsletterRequest $request)
    {
        $newsletter = $this->newsletterRepository->find($id);

        if (empty($newsletter)) {
            Flash::error('Newsletter not found');

            return redirect(route('admin.newsletters.index'));
        }

        $newsletter = $this->newsletterRepository->update($request->all(), $id);

        Flash::success('Newsletter updated successfully.');

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
            Flash::error('Newsletter not found');

            return redirect(route('admin.newsletters.index'));
        }

        $this->newsletterRepository->delete($id);

        Flash::success('Newsletter deleted successfully.');

        return redirect(route('admin.newsletters.index'));
    }
}
