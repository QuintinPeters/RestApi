<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($validated)) {

            return response()->json([
                'message' => 'login information invalid',
            ], 401);
        }
        ;
        $user = User::where('email', $validated['email'])->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('api_token')->plainTextToken,
        ]);

    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email|',
            'password' => 'required|confirmed|min:7'

        ]);

        $user = User::create($validated);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('api_token')->plainTextToken,
        ], 201);
    }

    public function logout()
    {
        Auth()->user()->Accesstoken()->delete();
        return response()->json([
            'message' => 'succesfully logout'
        ], 200);
    }

    public function user()
    {
        return Response()->json([
            'user' => Auth()->user()
        ], 200);
    }
}