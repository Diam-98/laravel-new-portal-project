<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.author.index',
            [
                'authors' => User::where('role', 'author')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validated($request->all());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);

        return to_route('author.index')->with('success', 'Auteur ajoute avec succes');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        return view('back.author.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $author)
    {
        $request->validated($request->all());

        $author->update($request->all());

        return to_route('author.index')->with('success', 'Auteur modifie avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        $author->delete();

        return back()->with('success', 'Auteur supprime avec succes');
    }
}
