<?php

namespace App\Http\Controllers;

use App\ArticleSsj2;
use App\Http\Requests\ArticleUpdateRequest;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
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
        //$articles = ArticleSsj2::all();

        $article = ArticleSsj2::with("autor")->get();


        return response([
            'status' => 1,
            'data' => $article,
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
    public function store(ArticleUpdateRequest $request)
    {
        $data=$request->only(["title", "description", "image", "user_id"]);
        $path = $request->file("image")->store("articleImgs");
        $data["image"] = $path;

        $articleSsj2 = ArticleSsj2::create($data);

        return response([
            'status' => "201",
            'data' => $articleSsj2,
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
    public function show(ArticleSsj2 $articleSsj2)
    {

        $articleSsj2 = ArticleSsj2::with('autor')->find($articleSsj2 -> id);

        return response([
            'status' => "200",
            'data' => $articleSsj2,
            'msg' => 'All okay'
        ],200);

        //return $articleSsj2;
    }


    public function edit(ArticleSsj2 $articleSsj2)
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
    public function update(ArticleUpdateRequest $request, ArticleSsj2 $articleSsj2)
    {
        //$articleSsj2->update($request->all());

        $data = $request->only(['title', 'description', 'image','user_id']);

        $path = $request->file("image")->store("articleImgs");

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
        $articleSsj2-> title = $data['title'];
        $articleSsj2-> description = $data['description'];
        $articleSsj2-> image = $data['image'];
        $articleSsj2-> user_id= $data['user_id'];

        $articleSsj2->save();

        return response([
            'status' => "200",
            'data' => $articleSsj2,
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
     */
    public function destroy(ArticleSsj2 $articleSsj2)
    {
        $articleSsj2->delete();

        return response([
            'status' => "200",
            'data' => "Article destroyed",
            'msg' => 'Success'
        ],200);
    }
}
