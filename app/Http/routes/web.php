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
Route::resource('users', 'UserController');

Route::group(['middleware'=> 'auth'], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::post('/search', 'SearchController@search');
});







