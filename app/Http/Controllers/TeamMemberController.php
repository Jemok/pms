<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class TeamMembersController extends Controller
{

    public function teamMember()
    {
        return view('teams.team_members');
    }

}
?>