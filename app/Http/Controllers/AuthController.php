<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ])) {
            $user = User::where('email', $req->email)->first();
            $ability = ($user->role == 'admin') ? 'admin' : 'password';
            $token = $user->createToken('access-token', [$ability]);

            return response()->json([
                'token' => $token->plainTextToken
            ], 201);
        }
    }

    function register(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);

        User::create([
            'email' => $req->email,
            'password' => $req->password,
            'name' => $req->name
        ]);

        return response()->json([
            'message' => 'Successfuly register!'
        ], 201);
    }

    function logout(Request $req)
    {
        // Revoke the token that was used to authenticate the current request...
        $req->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out!'
        ], 200);
    }

    function forgotPassword()
    {
    }
}
