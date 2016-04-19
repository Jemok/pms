<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    if(Auth::guest()){

        return view('welcome');
    }

    return view('home');


});

Route::auth();

Route::get('/home', 'HomeController@index');

/*Project routes*/
Route::get('projects/create', 'ProjectController@create');

/*team routes*/
Route::post('teams/store', 'TeamController@store');

/*sprint routes*/
Route::get('sprints/create', 'SprintController@create');

/*task routes*/
Route::get('tasks/create','TaskController@create');