<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('image')){
            if (file_exists(public_path('back_auth/assets/profile'.$request->user()->image)) AND !empty($request->user()->image)){
                unlink(public_path('back_auth/assets/profile'.$request->user()->image));
            }
        }

        $ext = $request->file('image')->extension();
        $file_name = date('YmdHis').'.'.$ext;
        $request->file('image')->move(public_path('back_auth/assets/profile'), $file_name);

        $request->user()->image = $file_name;
        $request->user()->name = $request->name;
        $request->user()->email = $request->email;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profile modifie avec succes');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
