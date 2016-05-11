<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\TeamRepository;
use App\Team;
use Illuminate\Support\Facades\Request;
use App\Facades\Search;


class AllTeamsController extends Controller
{
    public function allTeams(TeamRepository $teamRepository, Search $search)
    {
        if($q = Request::get('q')){
            $teams = Search::teams($q)->paginate(5);
        }
        else {
            $teams = $teamRepository->index();
        }

        return view('teams.all_teams', compact('teams'));
    }
}
?>