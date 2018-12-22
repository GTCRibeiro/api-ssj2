<?php

namespace App\Http\Controllers;

use App\Model\Genre;
use App\Model\Review;
use App\User;
use App\Http\Requests\Game_ssj2sUpdateRequest;
//use App\Http\Resources\Reviews\ReviewsResource;
use Illuminate\Http\Request;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $review = Review::with('game','user')->get();


        return response([
            'status' => 1,
            'data' => $review,
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
        $data = $request->only(["name", "description", "image", "review"]);
        if (!$path = $request->file('articleImgs')) {
            $data["image"] = 'gameImgs/same.png';
        } else {
            $path = $request->file("image")->store("gameImgs");
            $data["image"] = $path;
        }
        $game_ssj2s = Review::create($data);

        return response([
            'status' => "201",
            'data' => $game_ssj2s,
            'msg' => 'All okay'
        ], 201);
    }


        /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //$game_ssj2s = Review::where('id', 'LIKE',  $game_ssj2s)->first();

        //$game_ssj2s->user = User::where('id', 'LIKE', $game_ssj2s->user_id)->first();


        //$game_ssj2s = User::with('gamesReviewed')->find($game_ssj2s);
        //$game_ssj2s = Game_ssj2s::with('createdBy')->find($game_ssj2s);

        //$game_ssj2s = Game_ssj2s::with("createdBy")->find($game_ssj2s);%

        //$game_ssj2s = new ReviewsResource($game_ssj2s);
        $review = Review::with('user', 'game')->find($review);


        return response([
            'status' => "200",
            'data' => $review,
            'msg' => 'All okay'
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
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
    public function update(Game_ssj2sUpdateRequest $request, Review $game_ssj2s)
    {
        //$articleSsj2->update($request->all());

        $data = $request -> only(['name', 'title', 'description', 'image', 'review']);

        $path = $request -> file("image")->store("gameImgs");

        $data["image"] = $path;

        if($request->only(['title'])){
            $game_ssj2s->title = $data['title'];
        }
        if($request->only(['name'])){
            $game_ssj2s->name = $data['name'];
        }
        if($request->only(['description'])){
            $game_ssj2s->description = $data['description'];
        }
        if($request->only(['review'])) {
            $game_ssj2s->review = $data['review'];
        }
        if($request->only(['image'])){
            $game_ssj2s->title = $data['iamge'];
        }

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
        /*$game_ssj2s -> title = $data['title'];
        $game_ssj2s -> description = $data['description'];
        $game_ssj2s -> image = $data['image'];
        $game_ssj2s -> user_id= $data['user_id'];
        $game_ssj2s -> review= $data['review'];
*/
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
    public function destroy(Review $game_ssj2s)
    {
        $game_ssj2s->delete();

        return response([
            'status' => "200",
            'data' => "Game destroyed",
            'msg' => 'Success'
        ],200);
    }
    public function getGamesUser(Review $review)
    {

        $review = Review::with('user')->get();

        return response([
            'status' => 200,
            'data' => $review,
            'msg' => 'All ok'
        ]);
    }
}
