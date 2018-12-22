<?php

namespace App\Http\Controllers;

use App\Model\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $game = Game::with('genre')->get();

        return response([
            'status' => 1,
            'data' => $game,
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
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return response([
            'status' => "200",
            'data' => $game,
            'msg' => 'All okay'
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
    public function GetReviews($game){

        $game = Game::with('reviews')->find($game);

        return response([
            'status' => "200",
            'data' => $game,
            'msg' => 'All okay'
        ],200);
    }
}
