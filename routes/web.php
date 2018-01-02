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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Frontend
Route::get('/home', 'HomeController@index')->name('home');

// Social login
Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

// Admin
Route::group(['as' => 'admin.', 'middleware' => 'roles','roles' =>['admin', 'sadmin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
	App::setLocale('ua');
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	Route::resource('user', 'UserController');
});


