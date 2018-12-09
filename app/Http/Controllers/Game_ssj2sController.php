<?php

namespace App\Http\Controllers;

use App\Game_ssj2s;
use App\Http\Requests\Game_ssj2sUpdateRequest;
use App\Http\Resources\Game_ssj2s\Game_ssj2sResource;
use Illuminate\Http\Request;
use Validator;

class Game_ssj2sController extends Controller
{
    /**
     * @OA\Get(
     *      path="/articleSsj2",
     *      operationId="showsArticles",
     *      tags={"Article"},
     *      summary="Shows article",
     *      description="Shows an article",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Shows articles
     */
    public function index()
    {


        $game_ssj2s = Game_ssj2s::all();

        return response([
            'status' => 1,
            'data' => $game_ssj2s,
            'msg' => 'All okay'
        ],200);
    }


    public function create()
    {
        //
    }
    /**
     * @OA\Post(
     *      path="/articleSsj2",
     *      operationId="postArticle",
     *      tags={"Article"},
     *      summary="Posts an article",
     *      description="Posts an article",
     *      @OA\Response(
     *          response=201,
     *          description="successful operation"
     *       ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="article title",
     *                     property="title",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="article description",
     *                     property="description",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="article image",
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                 ),
     *                 @OA\Property(
     *                     description="article author",
     *                     property="user_id",
     *                     type="integer",
     *                 ),
     *                 required={"image", "title", "description", "user_id"}
     *             )
     *         )
     *     ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Stores an article
     */
    public function store(Game_ssj2sUpdateRequest $request)
    {
        $data = $request -> only(["title", "description", "image", "studio_id"]);
        $path = $request -> file("image")->store("articleImgs");
        $data["image"] = $path;

        $game_ssj2s = Game_ssj2s::create($data);

        return response([
            'status' => "201",
            'data' => $game_ssj2s,
            'msg' => 'All okay'
        ],201);


    }

    /**
     * @OA\Get(
     *      path="/articleSsj2/{id}",
     *      operationId="showsArticle",
     *      tags={"Article"},
     *      summary="Shows an article",
     *      description="Shows an article",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Shows articles
     */
    public function show(Game_ssj2s $game_ssj2s)
    {

        //$game_ssj2s = Game_ssj2s::with('gamesFavorited')->find($game_ssj2s -> id);
        return $game_ssj2s;
        $game_ssj2s = new Game_ssj2sResource($game_ssj2s);

        return response([
            'status' => "200",
            'data' => $game_ssj2s,
            'msg' => 'All okay'
        ],200);

        //return $articleSsj2;
    }


    public function edit(Game_ssj2s $game_ssj2s)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/articleSsj2/{id}",
     *      operationId="updateArticle",
     *      tags={"Article"},
     *      summary="Updates an article",
     *      description="Updates an article",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *     @OA\Parameter(
     *          name="id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="article title",
     *                     property="title",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="article description",
     *                     property="description",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     description="article image",
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                 ),
     *                 @OA\Property(
     *                     description="article author",
     *                     property="user_id",
     *                     type="integer",
     *                 ),
     *                 required={"image", "title", "description", "user_id"}
     *             )
     *         )
     *     ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Updates an article
     */
    public function update(Game_ssj2sUpdateRequest $request, Game_ssj2s $game_ssj2s)
    {
        //$articleSsj2->update($request->all());

        $data = $request -> only(['title', 'description', 'image','user_id', 'review']);

        $path = $request -> file("image")->store("articleImgs");

        $data["image"] = $path;

       /* $validateData = Validator::make($data,[
            'title' => 'required|max:50',
            'description' => 'required|max:255',
            'user_id' => 'required|exists:users'
        ],
        [
            'title.required' => 'O titulo é obrigatório',
            'title.max' => 'Titulo com número inválido de caracteres',

            'description.required' => 'A descrição é obrigatória',
            'description.max' => 'Descrição com número inválido de caracteres',


        ]);

        if($validateData->fails()){
            return $validateData-> errors()->all();
        }
    */
        $game_ssj2s -> title = $data['title'];
        $game_ssj2s -> description = $data['description'];
        $game_ssj2s -> image = $data['image'];
        $game_ssj2s -> user_id= $data['user_id'];
        $game_ssj2s -> review= $data['review'];

        $game_ssj2s->save();

        return response([
            'status' => "200",
            'data' => $game_ssj2s,
            'msg' => 'All okay'
        ],200);
    }

    /**
     * @OA\Delete(
     *      path="/articleSsj2/{id}",
     *      operationId="deleteArticle",
     *      tags={"Article"},
     *      summary="Deletes an article",
     *      description="Deletes an article",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Destroys an article
     *
     */
    public function destroy(Game_ssj2s $game_ssj2s)
    {
        $game_ssj2s->delete();

        return response([
            'status' => "200",
            'data' => "Game destroyed",
            'msg' => 'Success'
        ],200);
    }
    public function getGamesUser(Game_ssj2s $game_ssj2s){
        $data = User::with("gamesReviewed")->get()->where("createdBy", $game_ssj2s);

        return response([
            'status'=> 200,
            'data' => $data,
            'msg' => 'All ok'
        ]);
    }
}
