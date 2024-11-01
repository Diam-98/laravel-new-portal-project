<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialMedia\StoreSocialMediaRequest;
use App\Http\Requests\SocialMedia\UpdateSocialMediaRequest;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.social.index',
            [
                'socials' => SocialMedia::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $request->validated($request->all());

        SocialMedia::create($request->all());

        return to_route('social.index')->with('success', 'Reseau ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function edit(SocialMedia $social)
    {
        return view('back.social.create', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $social)
    {
        $request->validated($request->all());

        $social->update($request->all());

        return to_route('social.index')->with('success', 'Reseau modifie avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $social)
    {
        $social->delete();

        return back()->with('success', 'Reseau supprime avec succes');
    }
}
