<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use PHPOpenSourceSaver\JWTAuth\Contracts\Providers\JWT;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw new AuthenticationException();
        }
        else {

         $user=auth()->user();
         return[
                'message'=>'you are login successfully',

                'token' => auth()->user()->createToken('')->plainTextToken,
         ];

        }
    }


    // public function register(Request $request)
    // {

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     $token = Auth::attempt($request->only(['email', 'password']));



    //         return response()->json([
    //             'message' => 'User created successfully',
    //             'token' => auth()->user()->createToken('')->plainTextToken,
    //             'user' => $user,

    //             ]
    //         );
    // }




    public function logout(Request $request): string
    {
        auth()->user()->tokens()->delete();

        return 'tokens are deleted';
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
