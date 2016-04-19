<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


class SprintController extends Controller
{
    public function create()
    {
        return view('sprints.create_sprint');
    }
}
?>