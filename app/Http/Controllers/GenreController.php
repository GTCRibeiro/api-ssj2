<?php

namespace App\Http\Controllers;

use App\Model\Genre;
use Illuminate\Http\Request;
use App\Model\Review;
use App\User;
use App\Http\Requests\Game_ssj2sUpdateRequest;

//use Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::all();

        return response([
            'status' => 1,
            'data' => $genre,
            'msg' => 'All okay'
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //$genre = Genre::where('id', 'LIKE',  $genre)->first();

        //$genre-> game_ssj2s = game_ssj2s::where('id', 'LIKE', $genre->genreId)->first();

        //$genre-> Game_ssj2s::with('whichGameGenre') ->find($genre);
        //$game_ssj2s = User::with('gamesReviewed')->find($game_ssj2s);
        //$game_ssj2s = Game_ssj2s::with('createdBy')->find($game_ssj2s);

        //$game_ssj2s = Game_ssj2s::with("createdBy")->find($game_ssj2s);



        //$game_ssj2s = new ReviewsResource($game_ssj2s);

        return response([
            'status' => "200",
            'data' => $genre,
            'msg' => 'All okay'
        ],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
    }
    public function getGames( $genre){

        $genre = Genre::with('games')->find($genre);

        return response([
            'status' => "200",
            'data' => $genre,
            'msg' => 'All okay'
        ],200);
    }
}
