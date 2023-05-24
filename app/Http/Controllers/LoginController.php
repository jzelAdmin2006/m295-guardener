<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return ['plainTextToken' => $request->user()->createToken('auth_token')->plainTextToken];
        } else {
            return response()->json([
                'errors' => ['general' => 'E-Mail oder Passwort falsch.']
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function checkAuth(Request $request)
    {
        return $request->user();
    }
}
