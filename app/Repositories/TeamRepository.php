<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: renn
 * Date: 5/4/16
 * Time: 5:02 PM
 */
use App\Team;
use App\Team_user;

class TeamRepository
{
    protected $model;
    public function __construct(Team $team)
    {
        $this->model=$team;
        
    }
    public function index()
    {
        return Team::all();

    }

    public function userTeams(){

        $user_teams = Team_user::where('user_id', '=', \Auth::user()->id)->get();

//        dd($user_teams);

    }

}