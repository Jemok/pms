<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\Project;
use App\Repositories\SprintRepository;
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

    public function store(SprintRepository $sprintRepository, CreateSprintRequest $createSprintRequest)
    {
        $project = Project::findOrFail($createSprintRequest->project_id);

        $project->sprints()->create([


            'sprint_name'=> $createSprintRequest->sprint_name,
            'description' => $createSprintRequest->description,
            'deliverable'=> $createSprintRequest->deliverable,
            'milestone' => $createSprintRequest->milestone,
            'started_at' => $createSprintRequest->started_at,
            'ended_at' => $createSprintRequest->ended_at,
            'user_id' => \Auth::user()->id,

        ]);

        Session::flash('flash_message', 'Sprint was created successfully');

        return $this->create(new ProjectRepository(new Project()));
    }
}
?>