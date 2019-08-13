<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->char('kode_kode')->unique();
            $table->string('buku_judul');
            $table->integer('buku_jumlah');
            $table->string('buku_deskripsi');
            $table->string('buku_pengarang');
            $table->integer('buku_tahun_terbit');
             $table->unsignedBigInteger('kategori_id');
             $table->foreign('kategori_id')->references('id')->on('kategoris')->ondelete('cascade');
             $table->unsignedBigInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('id')->on('penerbits')->ondelete('cascade');
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
        Schema::dropIfExists('bukus');
    }
}
