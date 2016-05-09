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
    
<<<<<<< HEAD
/*
   public function create()
    {
        $teams = DB::table('teams')->get();

        return view('team.show',['teams=>$teams']);

        foreach ($teams as $team){
=======
>>>>>>> ab15b9059a911a0c0206df99921793313b3257d0

}
