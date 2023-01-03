<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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

    public function listKategori()
    {
        $kategori = Kategori::all();
        if(!$kategori) {
            return response()->json([
                "status" => false,
                "message" => "Data kategori tidak ada",
                "code" => null,
            ],400);
        }

        return response()->json([
            "status" => "success",
            "message" => "kategori berhasil didapatkan",
            "data" => $kategori
        ],200);

    }

    public function createBuku(Request $request)
    {
        $payload = $request->all();
        $payload['file'] = $request->file->store('buku', 'public');
        $payload['image'] = $request->image->store('buku', 'public');

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
        if (!isset($payload['image'])) {
            return response()->json([
                "status" => false,
                "message" => "image harus diisi",
                "code" => null,
            ], 400);
        }

        // dd($payload);
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

    public function detailLaporan()
    {
        // $peminjam = User::query()->where('role', 1)->get();
        $peminjam = Peminjaman::with(['user', 'detailPeminjaman'])->distinct('id_user')->get();
        if(!$peminjam) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data berhasil didapatkan",
            "data" => $peminjam
        ]);
        
    }

    public function laporanCount()
    {
        $peminjam = DB::select(
            'SELECT 
            "peminjaman"."id_user",  count("detail_peminjaman"."id") 
            FROM "detail_peminjaman", "peminjaman"            
            WHERE detail_peminjaman.id_peminjaman = peminjaman.id GROUP BY "peminjaman"."id_user"'
        );
    
        if(!$peminjam) {
            return response()->json([
                "status" => false,
                "message" => "Data tidak ditemukan",
                "data" => $peminjam
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Data berhasil didapatkan",
            "data" => $peminjam
        ], 200);

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
        if(isset($request->image)) {
            Storage::disk('public')->delete($buku->image);
            $payload['image'] = $request->image->store('buku', 'public');
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
