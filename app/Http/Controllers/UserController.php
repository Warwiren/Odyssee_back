<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;



class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(["message" => "The provided credentials do not match our records"], 401);
        }

        $user = $request->user();
        //$token = $user->createToken('authToken')->plainTextToken;

        //$cookie = cookie('auth_token', $token, 60 * 24 * 7); // set the cookie for 7 days

        // Return response with JSON data and cookie
        // return response()->json(['user' => $user, 'token' => $token])->cookie($cookie);
        Auth::login($user);
        return response()->json($user, 201);
    }

    public function logout(Request $request) {


        Auth::guard('web')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return response()->noContent();
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

}
