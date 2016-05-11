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
        $team = Team::findOrFail($team_id)->with('admin.user', 'team_user')->first();

        return view('teams.edit_team', compact('team'));
    }

    public function update(CreateTeamRequest $createTeamRequest, $team_id){

        $team = Team::findOrFail($team_id);

        $team->update($createTeamRequest->all());

        Session::flash('flash_message', 'Team was updated successfully');

        $team = Team::findOrFail($team_id)->with('admin.user', 'team_user')->first();

        return view('teams.edit_team', compact('team'));

    }

}
?>