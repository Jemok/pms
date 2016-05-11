<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class AllProjectsController extends Controller
{
    
    public function allProjects()
    {
        return view('projects.all_projects');
    }
    
}
?>