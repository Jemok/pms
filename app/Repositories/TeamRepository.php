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

    /**
     * @param Team $team
     */
    public function __construct(Team $team)
    {
        $this->model=$team;
        
    }

    /**
     * Get all teams in the database
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Team::all();

    }

    /**
     * Get all the teams for the authenticated user
     * @return mixed
     */
    public function userTeams(){

        return \Auth::user()->teams()->with('team')->take(5)->get();
    }

}