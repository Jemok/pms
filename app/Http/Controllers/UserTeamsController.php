<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Team;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Auth;

class UserTeamsController extends Controller
{

    public function userTeams(TeamRepository $teamRepository)
    {
        $teams = $teamRepository->userTeams()->paginate(5);

        return view('teams.user_teams', compact('teams'));
    }

}

