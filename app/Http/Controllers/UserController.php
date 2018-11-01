<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Validator;
use App\ArticleSsj2;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/user",
     *      operationId="showsUsers",
     *      tags={"User"},
     *      summary="Shows user",
     *      description="Shows an user",
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
     * Shows users
     */
    public function index()
    {
        $users =  User::all();

        return response([
        'status'=> 200,
        'data' => $users,
        'msg' => ("All okay")
    ]);
    }


    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/user",
     *      operationId="postUser",
     *      tags={"User"},
     *      summary="Posts an user",
     *      description="Posts an user",
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
     * Stores a user
     */
    public function store(UserUpdateRequest $request)
    {
        $data=$request->only(["name","email","password"]);
        $data["password"] = bcrypt($data["password"]);
        $user = User::create($data);

        return response([
            'status'=> 200,
            'data' => $user,
            'msg' => ("All okay")
        ]);
    }

    /**
     * @OA\Get(
     *      path="/user/{id}",
     *      operationId="showsUser",
     *      tags={"User"},
     *      summary="Shows a user",
     *      description="Shows a user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
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
     * Shows user
     */
    public function show(User $user)
    {
        return response([
            'status'=> 200,
            'data' => $user,
            'msg' => ("All okay")
        ]);
    }


    public function edit(User $user)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/user/{id}",
     *      operationId="updateUser",
     *      tags={"User"},
     *      summary="Updates a user",
     *      description="Updates a user",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
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
    public function update(UserUpdateRequest $request, User $user)
    {

        $data = $request->only(['name', 'email', 'password']);

        /*$validateData = Validator::make($data,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]
            [
               'name.required' => 'A mensagem que quisermos, tipo, o nome é preciso',
                'name.max' => 'Nome com número inválido de caracteres',

                'email.required' => 'Email é obrigatório',
                'email.email' => 'Email introduzido não é válido',
                'email.unique:users' => 'Email não é único',

                'password.required' => 'Password é obrigatória',
                'password.min' => 'Password com tamanho inválido'
            ]
            );

        if($validateData->fails()){
            return response([
               'status' => 400,
               'data' => $validateData->errors()->all(),
               'msg' => 'error'
            ],400);
            //return $validateData-> errors()->all();
        }*/


        $user-> name = $data['name'];
        $user-> email = $data['email'];
        $user-> password = $data['password'];

        $user->save();

        return response([
            'status'=> 200,
            'data' => $user,
            'msg' => 'All ok'
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/user/{id}",
     *      operationId="deleteUser",
     *      tags={"User"},
     *      summary="Deletes a user",
     *      description="Deletes a user",
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
     * Destroys a user
     */

    public function destroy(User $user)
    {
        $user->delete();
        return response([
            'status'=> 200,
            'data' => "User destroyed",
            'msg' => 'Success'
        ]);
    }
    /**
     * @OA\Get(
     *      path="/user/{id}/articles",
     *      operationId="showsUserArticles",
     *      tags={"User"},
     *      summary="Shows a userArticles",
     *      description="Shows a userArticles",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Parameter(
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
    public function getUserArticles(User $user){
        $data = ArticleSsj2::with("autor")->get()->where("autor", $user);

        return response([
            'status'=> 200,
            'data' => $data,
            'msg' => 'All ok'
        ]);
    }
}
