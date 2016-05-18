<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

class EditProfileController extends Controller
{
    
    public function update(Request $request)
    {
        $profile = \Auth::user();
        
        $profile->update($request->all());

        Session::flash('flash_message', 'You have updated your profile successfully');

        return redirect()->back();
    }
}
