<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\Project;
use App\Repositories\SprintRepository;
use App\Sprint;
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
    public function show()
    {
        return view('sprints.sprint_details');
    }
    public function edit()
    {
        return view('sprints.edit_sprint');
    }
}
?>