<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {   
        $token = auth('api')->attempt($request->all(['email', 'password']));
        if ($token) {
            return response()->json(['token'=> $token], 200);
        }
        return response()->json(['erro'=> 'Usuário ou senha inválido.'], 403);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }
}
