<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Team;
use App\Http\Requests\CreateTeamRequest;
use Illuminate\Support\Facades\Session;


class EditTeamController extends Controller
{

    public function editTeam($team_id)
    {
        $team = Team::where('id', '=', $team_id)->with('admin.user', 'team_user.user')->first();

        $team_users = $team->team_user;

        return view('teams.edit_team', compact('team', 'team_users'));
    }

    public function update(CreateTeamRequest $createTeamRequest, $team_id){

        $team = Team::findOrFail($team_id);

        $team->update($createTeamRequest->all());

        $team = Team::where('id', '=', $team_id)->with('admin.user', 'team_user.user')->first();

        $team_users = $team->team_user;

        Session::flash('flash_message', 'Team was updated successfully');

        $team = Team::findOrFail($team_id)->with('admin.user', 'team_user')->first();

        return view('teams.edit_team', compact('team', 'team_users'));
    }
}
?>