<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class UserProfileController extends Controller
{

    public function userProfile()
    {
        return view('profile.user_profile');
    }

}
?>