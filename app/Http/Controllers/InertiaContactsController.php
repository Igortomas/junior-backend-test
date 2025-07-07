<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Inertia\Inertia;

class InertiaContactsController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'contacts' => Contact::paginate(10)
        ]);
    }

    public function create()
    {
        return Inertia::render('Contacts/Register');
    }

    public function store(ContactsRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        return redirect()->route('contacts.index')
                        ->with('success', 'Contato criado com sucesso!');
    }

    public function edit($contactId)
    {
        $contact = Contact::findOrFail($contactId);

        return Inertia::render('Contacts/Register', [
            'contact' => $contact
        ]);
    }

    public function update(ContactsRequest $request, $id)
    {
        $data = $request->validated();

        $contact = Contact::findOrFail($id);
        $contact->update($data);

        return redirect()->route('contacts.index')
                        ->with('success', 'Contato atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')
                        ->with('success', 'Contato excluído com sucesso!');
    }

}