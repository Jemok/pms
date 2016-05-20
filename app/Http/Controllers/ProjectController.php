<?php

namespace App\Http\Controllers;

use App\Project;
use App\Project_user;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateProjectRequest;
use App\Repositories\TeamRepository;
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{

    public function create(TeamRepository $teamRepository, ProjectRepository $projectRepository)
    {
            $teams=$teamRepository->userTeams()->get();

            return view('projects.create_project', compact('teams'));
    }
    public function store(CreateProjectRequest $createProjectRequest)
    {
            $project = Project::create($createProjectRequest->all());

            $project->creator()->create([
                'user_id' => Auth::user()->id
            ]);

            $project->user()->create([
                'user_id' => Auth::user()->id
            ]);

            $project->team()->create([
                'team_id' => $createProjectRequest->get('team_id')
            ]);
            Session::flash('flash_message', 'Project was created successfully');
            return redirect()->back();
       }
    

    public function addMember(Request $request, $project_id){
        $member_id = $request->get('user_id');

        if(Project_user::where('user_id', '=', $member_id)->where('project_id', '=', $project_id)->exists()){

            Session::flash('flash_message_error', 'User is already in project');

            return redirect()->back();
        }
        
        $project = Project::findOrFail($project_id);

        $project->user()->create([

            'user_id' => $member_id

        ]);
        
        Session::flash('flash_message', 'Member was added successfully');

        return redirect()->back();
        
    }
    public function index()
    {
        $projects = Project::all();
        return view('projects.create_project', compact('projects'));
    }
    public function edit()
    {
        return view('projects.edit_project');
    }
}