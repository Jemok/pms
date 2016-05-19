<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Team;

class TeamDetailsController extends Controller
{
    public function teamDetails($team_id)
    {
        $team = Team::where('id', '=', $team_id)->first();

        $projects = $team->projects()->with('project')->paginate(5);

        return view('teams.team_details', compact('team', 'projects'));
    }
}

