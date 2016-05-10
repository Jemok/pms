<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;



class AllTeamsController extends Controller
{
    public function allTeams()
    {
        return view('teams.all_teams');
    }

}
?>