<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\Project;
use App\Repositories\SprintRepository;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSprintRequest;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SprintController extends Controller
{
    public function create(ProjectRepository $projectRepository)
    {
        $projects=$projectRepository->index();
        
        
        return view('sprints.create_sprint',compact('projects'));
    }

    public function store(CreateSprintRequest $createSprintRequest)
    {
        $project = Project::findOrFail($createSprintRequest->project_id);
        
        $sprint = $project->sprints()->create($createSprintRequest->all());
        
        $sprint->creator()->create([
           'user_id'=> Auth::user()->id 
        ]);
        
        $sprint->users()->create([
            'user_id' => Auth::user()->id
        ]);
        Session::flash('flash_message', 'Sprint was created successfully');

        return $this->create(new ProjectRepository(new Project()));
    }
}
?>