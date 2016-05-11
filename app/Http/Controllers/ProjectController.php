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
use App\Repositories\ProjectRepository;

class ProjectController extends Controller
{

    public function create(TeamRepository $teamRepository, ProjectRepository $projectRepository)
    {
            $teams=$teamRepository->index();
            $projects=$projectRepository->index();
            return view('projects.create_project', compact('teams','projects'));
    }
    public function store(CreateProjectRequest $createProjectRequest)
    {
            $project = Project::create($createProjectRequest->all());

            $project->creator()->create([
                'user_id' => Auth::user()->id
            ]);



            $project->team()->create([
                'team_id' => $createProjectRequest->get('team_id')
            ]);
            Session::flash('flash_message', 'Projects was created successfully');
            return redirect()->back();
        }

        public function index()
        {
            $projects = Project::all();
            return view('projects.create_project', compact('projects'));
        }
}