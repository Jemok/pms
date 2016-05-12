<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: renn
 * Date: 5/4/16
 * Time: 5:02 PM
 */
use App\Project;
use Illuminate\Support\Facades\Auth;

class ProjectRepository
{
    protected $model;
    public function __construct(Project $project)
    {
        $this->model=$project;

    }
    public function index()
    {
        return Project::all();

    }

    public function projectsOfUser(){

        return Auth::user()->projects()->with('project.team.team');

    }

}