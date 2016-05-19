<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use App\Repositories\ProjectRepository;


class ProjectDetailsController extends Controller
{

    public function projectDetails($project_id)
    {

        $project = Project::where('id', '=', $project_id)->first();
         //->with('creator.user','sprints.sprint')->first();

        $sprints = $project->sprints()->with('sprint')->paginate(10);

        return view('projects.project_details', compact('sprints'));
    }
}
?>