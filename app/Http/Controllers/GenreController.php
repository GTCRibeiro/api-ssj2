<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Game_ssj2s;
use App\User;
use App\Http\Requests\Game_ssj2sUpdateRequest;
use App\Http\Resources\Game_ssj2s\Game_ssj2sResource;
use Validator;

class GenreController extends Controller
{
    public function index()
    {


        $genre = Genre::all();

        return response([
            'status' => 1,
            'data' => $genre,
            'msg' => 'All okay'
        ],200);
    }

    public function show(Genre $genre)
    {
        //$genre = Genre::where('id', 'LIKE',  $genre)->first();

        //$genre-> game_ssj2s = game_ssj2s::where('id', 'LIKE', $genre->genreId)->first();

        //$genre-> Game_ssj2s::with('whichGameGenre') ->find($genre);
        //$game_ssj2s = User::with('gamesReviewed')->find($game_ssj2s);
        //$game_ssj2s = Game_ssj2s::with('createdBy')->find($game_ssj2s);

        //$game_ssj2s = Game_ssj2s::with("createdBy")->find($game_ssj2s);



        //$game_ssj2s = new Game_ssj2sResource($game_ssj2s);

        return response([
            'status' => "200",
            'data' => $genre,
            'msg' => 'All okay'
        ],200);

        //return $articleSsj2;
    }
    public function getGames( $genre){

        $genre = Genre::with('whichGameGenre')->find($genre);

        return response([
            'status' => "200",
            'data' => $genre,
            'msg' => 'All okay'
        ],200);
    }
}
