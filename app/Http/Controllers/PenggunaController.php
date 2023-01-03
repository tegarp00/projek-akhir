<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    private $buku;
    private $peminjaman;

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

    public function peminjaman(Request $request)
    {     
        $buku = Buku::query()->where('id', $request->input('id_buku'))->first();
        $this->buku = $buku;
        
        if($buku->kuota == 0) {
            return response()->json([
                "status" => false,
                "message" => "Kuota Buku sudah habis",
                "data" => null,
            ], 404);
        }

        
        $payload = $request->all();
        $date = new DateTime();
        $date->modify('+7 day');
        $tanggalPengembalian = $date->format('Y-m-d');

        $peminjaman = new Peminjaman();
        $peminjaman->id_user = $request->input('id_user');
        $peminjaman->tanggal_pengembalian = $tanggalPengembalian;

        $peminjaman->status = false;
        $peminjaman->tanggal_peminjaman = date('Y-m-d');
        $buk = DB::table('detail_peminjaman')
             ->select(DB::raw('count(*) as jml'))
             ->join('peminjaman', 'detail_peminjaman.id_peminjaman', '=', 'peminjaman.id')
             ->where('peminjaman.id_user', '=', $peminjaman->id_user)
             ->where('detail_peminjaman.id_buku', '=', $request->input('id_buku'))
             ->first()->jml;

        $peminjaman->save();


        $id_peminjaman = $peminjaman->id;
        $payload['id_peminjaman'] = $id_peminjaman;
        $detailPeminjaman = DetailPeminjaman::query()->create($payload);
        $detailPeminjaman['statusPinjam'] = $buk;

        
        DB::transaction(function () {
            $this->buku->update(['kuota' => $this->buku->kuota-1]);
        });

        return response()->json([
            "status" => "success",
            "message" => "User berhasil meminjam buku",
            "data" => $detailPeminjaman
        ],201);

    }

    public function cekStatus()
    {
        $cekstatus = DB::table('users')
             ->select(DB::raw('users.id as id_user, users.name, count(detail_peminjaman.id_buku)'))
             ->join('peminjaman', 'peminjaman.id_user', '=', 'users.id')
             ->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman', '=', 'peminjaman.id')
             ->groupBy('users.id', 'users.name')
             ->first();
        return response()->json([
            "status" => "success",
            "message" => "Cek status",
            "data" => $cekstatus
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

    public function listPeminjaman()
    {

    }
}
