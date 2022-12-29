<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "detail_peminjaman";

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function bukuDetailPeminjaman()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
