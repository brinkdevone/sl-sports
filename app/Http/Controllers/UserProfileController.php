<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{

    public function show()
    {
        return view('links.profile', ['user' => Auth::user()] );
    }

    public function profile()
    {
        return view('links.profile', array('user' => Auth::user()) );
    }

    public function update(Request $request)
    {
        // User Profile name... Update


        // Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('links.profile', ['user' => Auth::user()] );
    }

}
