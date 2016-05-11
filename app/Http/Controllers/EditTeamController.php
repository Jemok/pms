<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class EditTeamController extends Controller
{

    public function editTeam()
    {
        return view('teams.edit_team');
    }

}
?>