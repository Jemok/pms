<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Team;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Auth;

class TeamDetailsController extends Controller
{

    public function teamDetails($team_id)
    {

        $team = Team::findOrFail($team_id)->with('admin', 'projects')->first();

        $projects = $team->projects()->with('project')->paginate(5);

        return view('teams.team_details', compact('team', 'projects'));
    }

}

