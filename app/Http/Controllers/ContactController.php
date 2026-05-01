<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends BaseController
{
    public function __construct(
        private readonly ContactService $contactService
    ) {
    }

    public function index(): View
    {
        $contacts = $this->contactService->getAllContacts();

        return view('contacts.index', compact('contacts'));
    }

    public function create(): View
    {
        return view('contacts.create');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $this->contactService->createContact($request->validated());

        return $this->redirectWithSuccess(
            'contacts.index',
            'Contact created successfully.'
        );
    }

    public function show(int $contact): View
    {
        $contact = $this->contactService->getContactById($contact);

        abort_if(! $contact, 404);

        return view('contacts.show', compact('contact'));
    }

    public function edit(int $contact): View
    {
        $contact = $this->contactService->getContactById($contact);

        abort_if(! $contact, 404);

        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, int $contact): RedirectResponse
    {
        $updated = $this->contactService->updateContact(
            $contact,
            $request->validated()
        );

        if (! $updated) {
            return $this->redirectBackWithError('Contact could not be updated.');
        }

        return $this->redirectWithSuccess(
            'contacts.index',
            'Contact updated successfully.'
        );
    }

    public function destroy(int $contact): RedirectResponse
    {
        $deleted = $this->contactService->deleteContact($contact);

        if (! $deleted) {
            return $this->redirectBackWithError('Contact could not be deleted.');
        }

        return $this->redirectWithSuccess(
            'contacts.index',
            'Contact deleted successfully.'
        );
    }
}
