<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function bookAvailable()
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

    public function createBorrowingBook(Request $request)
    {

        $payload = $request->all();
        if (!isset($payload['id_user'])) {
            return response()->json([
                "status" => false,
                "message" => "ID user harus diisi",
                "code" => null,
            ],400);
        }

        $date = new DateTime();
        $date->modify('+7 day');
        $tanggalPengembalian = $date->format('Y-m-d');

        $payload['status'] = false;
        $payload['tanggal_peminjaman'] = date('Y-m-d');
        $payload['tanggal_pengembalian'] = $tanggalPengembalian;

        // dd($payload);
        $peminjaman = Peminjaman::query()->create($payload);
        return response()->json([
            "status" => "success",
            "message" => "User berhasil meminjam buku",
            "data" => $peminjaman
        ],201);
    }

    public function createBorrowingDetail(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload['id_peminjaman'])) {
            return response()->json([
                "status" => false,
                "message" => "id peminjaman harus diisi",
                "code" => null,
            ],400);
        }

        if (!isset($payload['id_buku'])) {
            return response()->json([
                "status" => false,
                "message" => "id buku harus diisi",
                "code" => null,
            ],400);
        }

        $detailPeminjaman = DetailPeminjaman::query()->create($payload);
        return response()->json([
            "status" => "success",
            "message" => "Berhasil mendapatkan detail peminjaman",
            "data" => $detailPeminjaman
        ]);
    }
}
