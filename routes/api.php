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
//Users
Route::resource("users", "UserController");
Route::get("users/{user}", array('middleware' => 'cors', 'uses' => "UserController@show"));
Route::get('/users/{user}/reviews', 'UserController@getUserGames');

//Route::get('/user/{user}', 'UserController@getUser');
//Route::get("/authUser", "UserController@getAuthUser");
Route::get("/authUser", array('middleware' => 'cors', 'uses' => 'UserController@getAuthUser'));
//->middleware('auth:api');

//Reviews
Route::Resource("reviews", "ReviewController");
Route::get("review", "ReviewController@getGamesUser");

//Route::get('review/{id}', array('middleware' => 'cors', 'uses' => "ReviewController@show"));
//Route::resource("reviews", "ReviewController");

//Genres
Route::resource("genres", "GenreController");
Route::get("genres/{id}/games", "GenreController@GetGames");

//Games
Route::resource("games", "GameController");
Route::get("games/{id}/reviews", "GameController@GetReviews");




//Route::get("/")

//Route::get('example', array('middleware' => 'cors', 'uses' => 'ExampleController@dummy'));