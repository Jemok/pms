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

Route::get('register/confirm/{token}', 'Auth\AuthController@confirmEmail');

/*home page route*/
Route::get('/home', 'HomeController@index');

/*profile page route*/
Route::get('profile/edit','ProfileController@show');
Route::get('profile/userProfile/{user_id}','UserProfileController@userProfile');
Route::post('profile/update','EditProfileController@update');


/*Project routes*/
Route::get('projects/create', 'ProjectController@create');
Route::post('projects/store', 'ProjectController@store');
Route::get('projects/allProjects','AllProjectsController@allProjects');
Route::get('projects/edit','ProjectController@edit');

Route::post('admin/change/{team_id}', 'UserProfileController@changeAdmin');

Route::get('projects/projectDetails/{project_id}','ProjectDetailsController@projectDetails');
Route::post('projects/addMember/{project_id}', 'ProjectController@addMember');

/*team routes*/
Route::post('teams/store', 'TeamController@store');
Route::post('teams/update/{team_id}', 'EditTeamController@update');
Route::get('teams/teamDetails/{team_id}', 'TeamDetailsController@teamDetails');
Route::get('teams/allTeams', 'AllTeamsController@allTeams');
Route::get('teams/userTeams', 'UserTeamsController@userTeams');
Route::get('teams/editTeam/{team_id}', 'EditTeamController@editTeam');
Route::get('teams/teamMember', 'TeamMemberController@teamMember');

/*sprint routes*/
Route::get('sprints/create', 'SprintController@create');
Route::post('sprints/store', 'SprintController@store');
Route::get('sprints/allSprints' , 'AllSprintsController@allSprints');
Route::get('sprints/show/{sprint_id}','SprintController@show');
Route::get('sprints/edit','SprintController@edit');
Route::post('sprints/addMember/{sprint_id}', 'SprintController@AddMember');

/*task routes*/
Route::get('tasks/create','TaskController@create');
Route::post('tasks/store','TaskController@store');\
Route::post('tasks/assignMember/{task_id}', 'TaskController@assignMember');

/*team routes*/
Route::post('teams/create','TeamController@create');