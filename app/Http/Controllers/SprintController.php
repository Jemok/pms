<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\Project;
use App\Project_user;
use App\ProjectSprint;
use App\ProjectTeam;
use App\Repositories\SprintRepository;
use App\Sprint;
use App\Sprint_user;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSprintRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SprintController extends Controller
{
    public function create(ProjectRepository $projectRepository)
    {
        $projects=$projectRepository->projectsOfUser()->get();

        return view('sprints.create_sprint',compact('projects'));
    }

    public function store(CreateSprintRequest $createSprintRequest)
    {
        $project = Project::findOrFail($createSprintRequest->project_id);
        
        $sprint =  Sprint::create($createSprintRequest->all());
        
        $sprint->creator()->create([
           'user_id'=> Auth::user()->id 
        ]);
        
        $sprint->users()->create([
            'user_id' => Auth::user()->id
        ]);

        $project->sprints()->create([

            'sprint_id' => $sprint->id
        ]);

        Session::flash('flash_message', 'Sprint was created successfully');

        return $this->create(new ProjectRepository(new Project()));
    }

    public function show($sprint_id)
    {

        $project_id =  ProjectSprint::where('sprint_id', '=', $sprint_id)->first()->project_id;

        $sprint = Sprint::where('id', '=', $sprint_id)->with('task.task')->first();

        //dd($sprint);

        $tasks = $sprint->task()->with('task')->get();

        $sprint_user = Sprint_user::where('sprint_id', '=', $sprint_id)->lists('user_id');

        $sprint_users = Sprint_user::where('sprint_id', '=', $sprint_id)->get();

        $project_users = Project_user::where('project_id', '=', $project_id)->whereNotIn('user_id', $sprint_user)->get();

        return view('sprints.sprint_details', compact('sprint', 'tasks', 'project_users', 'sprint_users'));
    }


    public function addMember(Request $request, $sprint_id){

        $member_id = $request->get('user_id');

        if(Sprint_user::where('user_id', '=', $member_id)->where('sprint_id', '=', $sprint_id)->exists()){

            Session::flash('flash_message_error', 'User is already in sprint');

            return redirect()->back();
        }

        $sprint = Sprint::findOrFail($sprint_id);

        $sprint->users()->create([
            'user_id' => $member_id
        ]);

        Session::flash('flash_message', 'Member was added successfully');

        return redirect()->back();
    }

    public function edit()
    {
        return view('sprints.edit_sprint');
    }
}
?>