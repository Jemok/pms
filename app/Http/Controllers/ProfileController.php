<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\EditProfileRepository;



class ProfileController extends Controller
{
    public function show(EditProfileRepository $editProfileRepository)
    {
        $users=$editProfileRepository->index();
        return view('profile.edit_profile',compact('users'));
    }
}
?>