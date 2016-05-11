<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;
use App\Team;
use App\Http\Requests\CreateTeamRequest;


class EditTeamController extends Controller
{

    public function editTeam($team_id)
    {
        $team = Team::findOrFail($team_id)->with('admin.user', 'team_user')->first();

        return view('teams.edit_team', compact('team'));
    }

    public function update(CreateTeamRequest $createTeamRequest, $team_id){

        Team::findOrFail($team_id)->update($createTeamRequest->all());

        return $this->editTeam($team_id);
    }

}
?>