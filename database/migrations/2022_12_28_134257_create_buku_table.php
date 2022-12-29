<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('judul');
            $table->integer('jumlah_halaman');
            $table->integer('kuota');
            $table->string('file');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->date('tahun_terbit');
            $table->string('author');
            $table->integer('isbn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
