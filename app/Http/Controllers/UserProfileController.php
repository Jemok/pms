<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use Illuminate\Foundation\Auth\User;


class UserProfileController extends Controller
{

    public function userProfile($user_id)
    {

        if($user_id == \Auth::user()->id){

            return redirect('profile/edit');
        }

        $user = User::findOrFail($user_id);

        return view('profile.user_profile', compact('user'));
    }

}
?>