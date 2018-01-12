<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['namespace' => 'Api'], function() {

	Route::get('/lpz',  ['uses' => 'LpzController@getLpz']);
	Route::post('/lpz', ['uses' => 'LpzController@postLpz']);
	Route::put('/lpz/{lpz}', ['uses' => 'LpzController@putLpz']);
	Route::delete('/lpz/{lpz}', ['uses' => 'LpzController@deleteLpz']);

	Route::get('/works',  ['uses' => 'WorkController@getWorks']);
	Route::get('/work/{work}',  ['uses' => 'WorkController@getWork']);
	Route::post('/work', ['uses' => 'WorkController@postWork']);
	Route::put('/work/{work}', ['uses' => 'WorkController@putWork']);
	Route::delete('/work/{work}', ['uses' => 'WorkController@deleteWork']);

});