<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully!',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $accessToken = null;
        try {
            if (!$accessToken = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Sai email or mật khẩu'
                ], 422);
            }
        } catch (JWTException $error) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('accessToken'));
    }
}
