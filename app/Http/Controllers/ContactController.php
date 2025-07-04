<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

final class ContactController extends Controller {
    public function index(): InertiaResponse {
        $contacts = Contact::paginate(10);

        return Inertia::render('Contacts/Index', [
            'contacts' => $contacts,
        ]);
    }

    public function store(ContactsRequest $request): RedirectResponse {
        $data = $request->validated();
        $data['phone'] = preg_replace('/\D/', '', $data['phone']);
        Contact::create($data);

        return redirect()->route('contacts.index');
    }

    public function update(ContactsRequest $request, int $id): RedirectResponse {
        $contact = Contact::findOrFail($id);

        $data = $request->validated();
        $data['phone'] = preg_replace('/\D/', '', $data['phone']);
        $contact->update($data);

        return redirect()->route('contacts.index');
    }
    public function destroy(int $id): RedirectResponse {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
