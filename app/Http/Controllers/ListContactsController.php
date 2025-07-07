<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListContactsController extends Controller
{

    public function __invoke()
    {
        $contacts = Contact::paginate(10);

        return view('contacts.index', [
            'contacts' => $contacts,
        ]);
    }
}