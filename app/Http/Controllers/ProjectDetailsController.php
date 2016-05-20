<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use App\Project_user;
use App\ProjectTeam;
use App\Repositories\ProjectRepository;
use App\User;
use App\Team_user;


class ProjectDetailsController extends Controller
{

    public function projectDetails($project_id)
    {

        $team_id = ProjectTeam::where('project_id', '=', $project_id)->first()->team_id;

        $project = Project::where('id', '=', $project_id)->first();
         //->with('creator.user','sprints.sprint')->first();

        $sprints = $project->sprints()->with('sprint')->paginate(10);

        $project_user  = Project_user::where('project_id', '=', $project_id)->lists('user_id');

        $project_users  = Project_user::where('project_id', '=', $project_id)->with('user')->get();
        
        $team_users = Team_user::where('team_id', $team_id)->whereNotIn('user_id', $project_user)->get();

        return view('projects.project_details', compact('sprints', 'project', 'project_users', 'team_users'));
    }
}
?>