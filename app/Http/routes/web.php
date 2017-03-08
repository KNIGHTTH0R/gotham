<?php

use Illuminate\Support\Facades\Redis;
use gotham\Events\UserSignedUp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
    /test is used for testing new capabilities

*/
// Route::get('/test', function() {
    
//     event(new UserSignedUp('John Doe'));
    
//     return view('test-dashboard');
// });

// If authentecated already redirect from these pages
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', function (){
        return view('login');
    });
    Route::get('/register', function () {
        return view('register');
    });
    
});

Route::resource('/projects/rfis/posts', 'RFIPostController');

Route::resource('/projects/rfis', 'RFIController');

Route::post('/register', 'Auth\RegisterController@register');

Route::post('/login', 'Auth\LoginController@login');




// Authenticated users only

Route::post('/logout', 'Auth\LoginController@logout');
Route::get('users/disabled', 'UserController@getDisabledAccounts');



Route::group(['middleware'=> 'auth'], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/search', 'SearchController@search');
    
    Route::post('/projects/add_collaborator', 'ProjectController@saveCollaborator');
    Route::get('/projects/add_collaborator/{project}', 'ProjectController@addCollaborator');
    Route::post('/projects/remove_collaborator', 'ProjectController@removeCollaboratorFromProject');
    Route::get('/projects/remove_collaborator/{project}', 'ProjectController@removeCollaborator');
    Route::post('/projects/add_group', 'ProjectController@saveGroup');
    Route::get('/projects/add_group/{project}', 'ProjectController@addGroup');
    Route::post('/projects/remove_group', 'ProjectController@removeGroupFromProject');
    Route::get('/projects/remove_group/{project}', 'ProjectController@removeGroup');

    Route::post('/groups/add_user', 'GroupController@saveUser');
    Route::get('/groups/add_user/{group}', 'GroupController@addUser');
    Route::post('/groups/remove_user', 'GroupController@removeUserFromGroup');
    Route::get('/groups/remove_user/{group}', 'GroupController@removeUser');
});


Route::resource('users', 'UserController');

Route::resource('projects', 'ProjectController');

Route::resource('groups', 'GroupController');


//Route::get('/info', function (){
//    phpinfo();
//});



