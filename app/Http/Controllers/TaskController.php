<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\ProjectRepository;
use App\Http\Requests\CreateTaskRequest;
use App\Repositories\SprintRepository;

class TaskController extends Controller
{

    public function create(SprintRepository $sprintRepository)
    {
        $sprints=$sprintRepository->index();

        return view('tasks.create_task',compact ('sprints'));
    }

    public function store(CreateTaskRequest $createTaskRequest)
    {

        $task = Task::create($createTaskRequest->all());

        $task->creator()->create([
            'user_id' => Auth::user()->id
        ]);
        

        Session::flash('flash_message', 'Task was created successfully');

        return view('tasks.create_task', compact('projects'));
    }
}