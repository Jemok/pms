<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateTaskRequest;
use App\Repositories\SprintRepository;
use App\Task;
use App\Sprint;


class TaskController extends Controller
{

    public function create(SprintRepository $sprintRepository)
    {
        $sprints=$sprintRepository->index();

        return view('tasks.create_task',compact ('sprints'));
    }

    public function store(CreateTaskRequest $createTaskRequest)
    {
        $sprint = Sprint::findOrFail($createTaskRequest->sprint_id);


        $task = Task::create($createTaskRequest->all());
        
        $sprint->task()->create([
           
            'task_id' => $task->id
        ]);
        
        $task->creator()->create([
            'user_id' => \Auth::user()->id
        ]);
        

        Session::flash('flash_message', 'Task was created successfully');

        return redirect()->back();
    }
}