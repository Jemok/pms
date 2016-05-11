<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\ProjectRepository;;
class TaskController extends Controller
{
    public function create()
    {
        return view('tasks.create_task');
    }

    public function store(ProjectRepository $projectRepository)
    {
        $projects = $projectRepository->index();


        Session::flash('flash_message', 'Task was created successfully');

        return view('tasks.create_task', compact('projects'));
    }
}