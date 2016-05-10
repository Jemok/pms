<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSprintRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Session;

class SprintController extends Controller
{
    public function create(ProjectRepository $projectRepository)
    {
        $projects=$projectRepository->index();
        
        
        return view('sprints.create_sprint',compact('projects'));
    }

    public function store(ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->index();

        Session::flash('flash_message', 'Sprint was created successfully');

        return view('sprints.create_sprint', compact('projects'));
    }
}
?>