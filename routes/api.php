<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header( 'Access-Control-Allow-Headers: *' );


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
Route::resource("users", "UserController");
Route::get("users/{user}", array('middleware' => 'cors', 'uses' => "UserController@show"));
//Route::resource("reviews", "Game_ssj2sController");
Route::Resource("reviews", "Game_ssj2sController");
Route::get('review/{user}', 'Game_ssj2sController@show');
Route::get('/user/{user}/reviews', 'UserController@getUserGames');
//Route::get('/user/{user}', 'UserController@getUser');
//Route::get("/authUser", "UserController@getAuthUser");
Route::get("/authUser", array('middleware' => 'cors', 'uses' => 'UserController@getAuthUser'));
//->middleware('auth:api');
Route::resource("genres", "GenreController");
Route::get("genre/{id}", "GenreController@getGames");

//Route::get('example', array('middleware' => 'cors', 'uses' => 'ExampleController@dummy'));