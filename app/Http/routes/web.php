<?php

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

Route::post('/register', 'Auth\RegisterController@register');

Route::post('/login', 'Auth\LoginController@login');




// Authenticated users only

Route::post('/logout', 'Auth\LoginController@logout');
Route::get('users/disabled', function(){
        // Get all inactive accounts
        $users = DB::table('users')
        ->where('account_status', 'Disabled')
        ->paginate(25);
        $count = $users->count();
        $currentpage = 'disabled_users';

        return view('users.users', compact(['users','count','currentpage']));

});

Route::resource('users', 'UserController');


Route::group(['middleware'=> 'auth'], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/search', 'SearchController@search');
    

});







