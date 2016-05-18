<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Team;
use App\TeamAdmin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    /**
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function userProfile($user_id)
    {
        if($user_id == \Auth::user()->id){

            return redirect('profile/edit');
        }

        $user = User::findOrFail($user_id);

        return view('profile.user_profile', compact('user'));
    }

    /**
     * @param Request $request
     * @param $team_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeAdmin(Request $request, $team_id){

        $user_id = $request->get('user_id');

        $team_admin = TeamAdmin::where('team_id', '=', $team_id)
                                 ->where('old_status', '=', 1)
                                 ->first();

        $team = Team::findOrFail($team_id);

        $team_admin->update([

            'old_status' => 0

        ]);

         $team->admin()->create([

            'user_id' => $user_id,
            'old_status' => 1

        ]);

        if(\Auth::user()->id != $user_id){

            return redirect('teams/teamDetails/'.$team_id);
        }

        return redirect()->back();
    }
}
?>