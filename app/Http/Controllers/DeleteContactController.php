<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class DeleteContactController extends Controller
{
    public function __invoke($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return response()->json(['message' => 'Contato deletado com sucesso'], 200);
    }

}