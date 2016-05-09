<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;



class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.edit_profile');
    }
}
?>