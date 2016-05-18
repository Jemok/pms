<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\EditProfileRepository;



class ProfileController extends Controller
{
    public function show(EditProfileRepository $editProfileRepository)
    {

        return view('profile.edit_profile');
    }
}
?>