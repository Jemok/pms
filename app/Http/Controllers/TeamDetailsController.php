<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Team;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Auth;

class TeamDetailsController extends Controller
{

    public function teamDetails()
    {
        return view('teams.team_details');
    }

}

