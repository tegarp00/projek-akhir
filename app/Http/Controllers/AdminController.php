<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function createKategori(Request $request)
    {
        $payload["nama_kategori"] = $request->input('nama_kategori');
        if (!isset($payload['nama_kategori'])) {
            return response()->json([
                "status" => false,
                "message" => "Kategori harus diisi",
                "code" => null,
            ],400);
        }

        $kategori = Kategori::query()->create($payload);
        return response()->json([
            "status" => "success",
            "message" => "kategori berhasil ditambahkan",
            "data" => $kategori
        ],201);
    }

    public function createBuku(Request $request)
    {
        $payload = $request->all();
        $payload['file'] = $request->file->store('buku', 'public');

        if (!isset($payload['id_kategori'])) {
            return response()->json([
                "status" => false,
                "message" => "ID Kategori harus diisi",
                "code" => null,
            ],400);
        }

        if (!isset($payload['judul'])) {
            return response()->json([
                "status" => false,
                "message" => "Judul harus diisi",
                "code" => null,
            ], 400);
        }

        if (!isset($payload['jumlah_halaman'])) {
            return response()->json([
                "status" => false,
                "message" => "Jumlah halaman harus diisi",
                "code" => null,
            ], 400);
        }

        if (!isset($payload['kuota'])) {
            return response()->json([
                "status" => false,
                "message" => "Kuota harus diisi",
                "code" => null,
            ], 400);
        }

        if (!isset($payload['file'])) {
            return response()->json([
                "status" => false,
                "message" => "file harus diisi",
                "code" => null,
            ], 400);
        }

        $buku = Buku::query()->create($payload);
        return response()->json([
            "status" => "success",
            "message" => "buku berhasil ditambahkan",
            "data" => $buku
        ], 201);
    }

    public function detailBuku()
    {
        $bukus = Buku::with(['kategoriBuku'])->get();
        if(!$bukus) {
            return response()->json([
                "status" => false,
                "message" => "Buku tidak ditemukan",
                "data" => null,
            ], 404);
        }

        return response()->json([
            "status" => "success",
            "message" => "Buku berhasil dapatkan",
            "data" => $bukus
        ],200);
    }

    public function updateBuku(Request $request, $id)
    {
        $payload = $request->all();
        $buku = Buku::find($id);
        if(!$buku) {
            return response()->json([
                "status" => false,
                "message" => "ID Buku tidak ditemukan",
                "data" => null
            ], 404);
        }
        if (isset($request->file)) {
            Storage::disk('public')->delete($buku->file);
            $payload['file'] = $request->file->store('buku', 'public');
        }

        // dd($payload);
        $buku->update($payload);

        return response()->json([
            "status" => "success",
            "message" => "Buku berhasil diupdate",
            "data" => $buku
        ], 200);
    }

    public function deleteBuku($id)
    {
        $buku = Buku::find($id);
        if(!$buku) {
            return response()->json([
                "status" => false,
                "message" => "ID Buku tidak ditemukan",
                "data" => []
            ]);
        }

        $buku->delete();

        return response()->json([
            "status" => "success",
            "message" => "Buku berhasil dihapus",
            "data" => []
        ]);
    }
}
