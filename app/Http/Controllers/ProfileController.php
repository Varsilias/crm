<?php

namespace App\Http\Controllers;

use App\Models\TemporarayFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        return view('dashboard.profile.index')->with([
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->except(['name', 'email']));
        $user = User::where('id', $id)->first();

        // dd($request->all());
        $user->update($request->except(['name', 'email']));
        return redirect()->back()->with([
            'success' => 'Profile updated successfully'
        ]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '_' . now()->timestamp;
            $file->storeAs('public/avatars/' . $folder, $filename);

            return "$folder/$filename";
        }

        return '';
    }

}



// $temporaryFile = TemporarayFile::where('folder', $request->avatar)->first();
        // if ($temporaryFile) {
        //     $user->addMedia(storage_path('app/avatars/tmp/' . $request->avatar . '/' .$temporaryFile->filename))
        //         ->toMediaCollection();

        //     rmdir(storage_path('app/avatars/tmp/' . $request->avatar));
        //     $temporaryFile->delete();
        // }
