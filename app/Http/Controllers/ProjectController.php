<?php

namespace App\Http\Controllers;

use App\Project;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateProjectRequest;
use App\Repositories\TeamRepository;

class ProjectController extends Controller
{

    public function create(TeamRepository $teamRepository)
    {
        $teams=$teamRepository->index();
        return view('projects.create_project', compact('teams'));
    }
    public function store(CreateProjectRequest $createProjectRequest)
    {
        $project= Project::create([
            'project_name'=>$createProjectRequest->get('project_name'),
            'project_description'=>$createProjectRequest->get('project_description'),
            'project_status'=>$createProjectRequest->get('project_status'),
            'started_at'=>$createProjectRequest->get('started_at'),
            'ended_at'=>$createProjectRequest->get('ended_at')
        ]);
        $project->creator()->create([
            'user_id'=>Auth::user()->id
        ]);
        $project->team()->create([
            'team_id'=>$createProjectRequest->get('team_id')
        ]);
        Session::flash('flash_message', 'Projects was created successfully');
        return redirect()->back();
    }
}