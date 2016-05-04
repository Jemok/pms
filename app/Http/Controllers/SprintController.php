<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSprintRequest;


class SprintController extends Controller
{
    public function create()
    {
        return view('sprints.create_sprint');
    }
}
?>