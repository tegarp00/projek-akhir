<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id');
    }
}
