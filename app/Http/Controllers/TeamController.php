<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Team;
use App\Http\Requests\CreateTeamRequest;
class TeamController extends Controller
{

    public function store(CreateTeamRequest $createTeamRequest)
    {
        Auth()->user()->teams()->create($createTeamRequest->all());
        Session::flash('flash_message', 'Team was created successfully');
        return redirect()->back();
    }
<<<<<<< HEAD
/*
   public function create()
    {
        $teams = DB::table('teams')->get();

        return view('team.show',['teams=>$teams']);

        foreach ($teams as $team){

        echo $team->name;
    }
    }
    */
 public function create(){
     return view('teams.create_team');
 }
=======
    
>>>>>>> 0d8f1725feb00639d93322b75258f87fcf68edcf
}
