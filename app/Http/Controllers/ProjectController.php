<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{

    public function create()
    {
        return view('projects.create_project');
    }
}