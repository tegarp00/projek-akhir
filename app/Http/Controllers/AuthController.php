<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::query()->where("email", $request->input("email"))->first();

        // cek user
        if($user == null) {
            return response()->json([
                "status" => "error",
                "message" => "User not found",
                "data" => []
            ]);
        }

        // cek password
        if(!Hash::check($request->input("password"), $user->password)) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid password",
                "data" => []
            ]);
        }

        // create token
        $token = $user->createToken("auth_token");

        return response()->json([
            "status" => "success",
            "message" => "Token created",
            "data" => [
                "auth" => [
                    "token" => $token->plainTextToken,
                    "token_type" => 'Bearer'
                ],
                "user" => $user
            ]
        ]);
    }

    public function register(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload['name'])) {
            return response()->json([
                "status" => false,
                "message" => "Nama harus diisi",
                "code" => null,
            ]);
        }

        if (!isset($payload['email'])) {
            return response()->json([
                "status" => false,
                "message" => "Email harus diisi",
                "code" => null,
            ]);
        }

        if (!isset($payload['password'])) {
            return response()->json([
                "status" => false,
                "message" => "Password harus diisi",
                "code" => null,
            ]);
        }

        $payload['role'] = 1;

        $user = User::query()->create($payload);
        return response()->json([
            "status" => "success",
            "message" => "user berhasil mendaftar",
            "data" => $user
        ],201);
    }

    public function getUser(Request $request)
    {
        $user = $request->user();
        return response()->json([
            "status" => "success",
            "message" => "",
            "data" => $user
        ]);
    } 
}
