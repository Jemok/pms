<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: renn
 * Date: 5/4/16
 * Time: 5:02 PM
 */
use App\Team;
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

}