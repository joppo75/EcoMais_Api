<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\LoginRequest;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $obj = new User();
            $users = $obj->all();

            return [
                'status' => 1,
                'data' => $users
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            
            $obj = new User();
            $user = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $user
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {

            return [
                "status" => 1,
                "data" => $user
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $user->update($request->all());

            return [
                "status" => 1,
                "data" => $user
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $user->delete();

            return [
                "status" => 1,
                "data" => $user
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }

    public function login(LoginRequest  $request){

        $input = $request->all();

        $credentials = [
            "username" => $input["username"],
            "password" => $input["password"]
        ];

        if (auth()->attempt($credentials)) {

            $usuario = auth()->user();
            $token = $usuario->createToken('Home')->accessToken;

            return response()->json([
                "status" => true,
                "token" => $token,
                "usuario" => $usuario,
                
            ], 200);

        } else {

            return response()->json([
                "status" => false,
                'error' => 'Sem permissão.'
            ], 401);

        };
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->user()->token()->revoke();

            return response()->json([
                'status' => true,
                'message' => 'Logout successful.'
            ], 200);

        } else {
            return response()->json([
                'status' => false,
                'error' => 'Erro de logout. Talvez o seu token já tenha sido revogado. Por favor, tente novamente se não for o caso.'
            ], 500);
        }
    }
}
