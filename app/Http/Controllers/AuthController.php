<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        return response()->json([
            'status' => true,
            'data' => [
                'message' => 'Usuario creado correctamente.',
                'user' => $user
            ]
        ], 201);
    }

    static function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'message' => 'No autorizado'
                    ]
                ], 401);
            }

            $user = Auth::user();

            $tokenResult = $user->createToken('AccessToken');
            $token = $tokenResult->accessToken;

            return response()->json([
                'status' => true,
                'data' => [
                    'user' => $user['email'],
                    'accessToken' => $token,
                ]
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'data' => [
                    'error' => $ex
                ]
            ], 400);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens->each(function ($token, $key) {
                $token->delete();
            });

            return response()->json([
                'status' => true,
                'data' => [
                    'message' => 'Sesion cerrada correctamente.'
                ]
            ], 201);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'data' => [
                    'error' => $ex
                ]
            ], 400);
        }
    }
}
