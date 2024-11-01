<?php

namespace App\Http\Controllers;

use App\Http\Requests\contact\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }

    public function contact(StoreContactRequest $request){

        $request->validated($request->all());

        Contact::create($request->all());

        return back()->with('success', 'Message envoye succes, nous vous contacterons !');

    }
}
