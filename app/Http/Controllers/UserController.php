<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request){
        // $registerUserData  = $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|unique:users',
        //     'password' => 'required|string|confirmed'
        // ]);

        $input = $request->all();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        return response()->json([
            'message' => 'User Created ',
        ]);

        // $user = new User();
        // $user->name = $registerUserData ['name'];
        // $user->email = $registerUserData ['email'];
        // $user->password = bcrypt($registerUserData ['password']);
        // $user->save();
        // $token = $user->createToken('nouveau_token')->plainTextToken;
        // $response = [
        //     'user'=>$user,
        //     'token'=>$token
        // ];
        // return response($response, 201);
    }

    public function login(Request $request){
        $input = $request->all();

        // $loginUserData = $request->validate([
        //     'email'=>'required|string|email',
        //     'password'=>'required|string|confirmed'
        // ]);
        $user = User::where([
            'email' => $input['email'],
        ])->first();
        if(!$user || !Hash::check($input['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
          "message"=>"logged out"
        ]);
    }

    public function index()
    {
        return User::all();
    }

}
