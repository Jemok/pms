<?php
namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: renn
 * Date: 5/4/16
 * Time: 5:02 PM
 */
use App\Project;
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

}