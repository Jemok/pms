<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Team;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeamRepository $teamRepository)
    {
        $teams=$teamRepository->index();
        return view('home',compact('teams'));
    }
    public function homePage()
    {
        if(Auth::guest())
        {
            return view('Welcome');
        }
        return $this->index(new TeamRepository(new Team()));

    }
}
