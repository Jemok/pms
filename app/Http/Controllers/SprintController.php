<?php
namespace App\Http\Controllers;

use App\Http\Requests;

class SprintController extends Controller
{
    public function create()
    {
        return view('sprints.create_sprint');
    }
}
?>