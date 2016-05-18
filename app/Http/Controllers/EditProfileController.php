<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\EditProfileRepository;

class EditProfileController extends Controller
{
    
    public function update(Request $request)
    {
        $profile = \Auth::user();
        
        $profile->update($request->all());

        return redirect()->back();
    }
}
