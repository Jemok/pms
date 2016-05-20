<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use App\ProjectSprint;
use App\Task_user;
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
        $sprints=$sprintRepository->sprintsForUser()->get();

        $project = new Project();

        $sprint_project = new ProjectSprint();

        return view('tasks.create_task',compact ('sprints', 'project', 'sprint_project'));
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

    public function assignMember(Request $request, $task_id){

        $member_id = $request->get('user_id');
        
        $task = Task::findOrFail($task_id);
        
        if(Task_user::where('task_id', '=', $task_id)->exists()){
            
            Session::flash('flash_message_error', 'The task is assigned to someone else');
            
            return redirect()->back();
        }
        
        $task->user()->create([
           
            'user_id' => $member_id,
            'activity' => 1
            
        ]);
        
        Session::flash('flash_message', 'User was assigned to that task');
        
        return redirect()->back();
    }
}