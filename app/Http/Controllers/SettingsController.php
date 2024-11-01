<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('back.settings.index',
            ['settings' => Settings::where('id', 1)->first()]
        );
    }

    public function update(SettingsRequest $request){

        $request->validated($request->all());

        $logo = $request->logo;

        $setting = Settings::where('id', 1)->first();

        if ($logo != null && !$logo->getError()){
            if ($setting->logo){
                Storage::disk('public')->delete($setting->image);
            }
            $logo = $request->image->store('asset', 'public');
        }

        $setting->update([
           'web_site_name' => $request->web_site_name,
           'logo' => $logo,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'about' => $request->about
        ]);

        return back()->with('success', 'Paramettrage modifie avec succes');

    }
}
