<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\TeamRepository;


class AllTeamsController extends Controller
{
    public function allTeams(TeamRepository $teamRepository)
    {

        $teams = $teamRepository->index();

        return view('teams.all_teams', compact('teams'));
    }

}
?>