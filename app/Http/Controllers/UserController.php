<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if(!$users) {
            return response()->json([
                "status" => false,
                "message" => "Data users belum ada",
                "data" => []
            ],404);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data users berhasil didapatkan",
            "data" => $users
        ],200);
    }

    public function show($id)
    {
        $user = User::query()->where('id', $id)->first();
        if(!$user) {
            return response()->json([
                "status" => false,
                "message" => "ID user tidak ditemukan",
                "data" => []
            ],404);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data user berhasil didapatkan",
            "data" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                "status" => false,
                "message" => "ID user tidak ditemukan",
                "data" => []
            ]);
        }

        $user->update($payload);
        return response()->json([
            "status" => "success",
            "message" => "Data user berhasil diupdate",
            "data" => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                "status" => false,
                "message" => "ID user tidak ditemukan",
                "data" => []
            ]);
        }

        $user->delete();
        return response()->json([
            "status" => "success",
            "message" => "User berhasil didelete",
            "data" => []
        ]);
    }
}