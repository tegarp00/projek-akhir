<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "peminjaman";

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id');
    }
}
