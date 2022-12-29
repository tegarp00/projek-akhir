<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "kategori";

    public function bukuKategori()
    {
        return $this->hasMany(Buku::class, 'id');
    }
}
