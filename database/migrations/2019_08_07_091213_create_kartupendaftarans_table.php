<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartupendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartupendaftarans', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->char('kartupendaftaran_kode')->unique();
            $table->date('kartu_tanggal_pembuatan');
            $table->date('kartu_tanggal_akhir');
            $table->boolean('kartu_status_aktif');
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
        Schema::dropIfExists('kartupendaftarans');
    }
}
