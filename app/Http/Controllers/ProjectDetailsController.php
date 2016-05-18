<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class ProjectDetailsController extends Controller
{

    public function projectDetails()
    {
        return view('projects.project_details');
    }

}
?>