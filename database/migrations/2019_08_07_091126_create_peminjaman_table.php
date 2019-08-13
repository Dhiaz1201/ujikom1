<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->char('peminjaman_kode')->unique();
            $table->date('peminjaman_tgl');
            $table->date('peminjaman_tgl_kembali');
             $table->unsignedBigInteger('petugas_id');
            $table->foreign('petugas_id')->references('id')->on('petugas')->ondelete('cascade');
             $table->unsignedBigInteger('peminjam_id');
            $table->foreign('peminjam_id')->references('id')->on('peminjams')->ondelete('cascade');
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
        Schema::dropIfExists('peminjamen');
    }
}
