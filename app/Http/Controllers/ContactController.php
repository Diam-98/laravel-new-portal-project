<?php

namespace App\Http\Controllers;

use App\Http\Requests\contact\StoreContactRequest;
use App\Http\Requests\contact\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.contact',
            [
                'contacts' => Contact::all()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('success', 'Contact supprimer avec succes');
    }
}
