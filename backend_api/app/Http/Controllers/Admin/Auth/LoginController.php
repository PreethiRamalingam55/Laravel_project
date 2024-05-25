<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); 
        
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
