<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateTeamRequest;
use App\Team;
class TeamController extends Controller
{
    public function store(CreateTeamRequest $createTeamRequest)
    {
        $team = Team::create($createTeamRequest->all());

        \Auth::user()->teams()->create([
            'team_id' => $team->id,
        ]);

        $team->admin()->create([

            'user_id' => \Auth::user()->id
        ]);

        Session::flash('flash_message', 'Team was created successfully');

        return redirect()->back();
    }
}