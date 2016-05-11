<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectRepository;


class AllSprintsController extends Controller
{

    public function allSprints()
    {
        return view('sprints.all_sprints');
    }

}
?>