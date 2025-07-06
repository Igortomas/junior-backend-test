<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Models\Contact;

class UpdateContactController extends Controller
{
    public function __invoke(ContactsRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $data = $request->validated();
        $contact->update($data);

        return response()->json(['message' => 'Contato atualizado com sucesso']);
    }
}