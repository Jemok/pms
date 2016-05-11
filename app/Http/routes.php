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

Route::get('/','HomeController@homePage');

/*Authentication route*/
Route::auth();

/*home page route*/
Route::get('/home', 'HomeController@index');

/*profile page route*/
Route::get('profile/edit','ProfileController@show');
Route::get('profile/userProfile','UserProfileController@userProfile');

/*Project routes*/
Route::get('projects/create', 'ProjectController@create');
Route::post('projects/store', 'ProjectController@store');
Route::get('projects/allProjects','AllProjectsController@allProjects');


/*team routes*/
Route::post('teams/store', 'TeamController@store');
Route::post('teams/update/{team_id}', 'EditTeamController@update');
Route::get('teams/teamDetails/{team_id}', 'TeamDetailsController@teamDetails');
Route::get('teams/allTeams', 'AllTeamsController@allTeams');
Route::get('teams/userTeams', 'UserTeamsController@userTeams');
Route::get('teams/editTeam/{team_id}', 'EditTeamController@editTeam');

/*sprint routes*/
Route::get('sprints/create', 'SprintController@create');
Route::post('sprints/store', 'SprintController@store');
Route::get('sprints/allSprints' , 'AllSprintsController@allSprints');

/*task routes*/
Route::get('tasks/create','TaskController@create');
Route::post('tasks/store','TaskController@store');

/*team routes*/
Route::post('teams/create','TeamController@create');