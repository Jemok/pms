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
            'user_category' => 0
        ]);

        Session::flash('flash_message', 'Team was created successfully');

        return redirect()->back();
    }
}