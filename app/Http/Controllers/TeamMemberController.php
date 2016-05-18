<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class TeamMemberController extends Controller
{

    public function teamMember()
    {
        return view('teams.team_member');
    }

}
?>