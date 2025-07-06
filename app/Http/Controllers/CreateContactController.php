<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Models\Contact;

class CreateContactController extends Controller
{
    public function __invoke(ContactsRequest $contactsRequest)
    {
        $data = $contactsRequest->validated();

        $teste = Contact::create($data);

        return response()->json(['message' => 'Contato criado com sucesso'], 200);
    }
}
