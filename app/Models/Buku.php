<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "buku";

    public function kategoriBuku()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailPeminjamanBuku()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id');
    }
}
