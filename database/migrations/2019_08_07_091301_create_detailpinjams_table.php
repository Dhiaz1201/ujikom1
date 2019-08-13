<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpinjams', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->date('detail_tgl_kembali');
             $table->double('detail_denda');
             $table->boolean('detail_status_kembali');
               $table->unsignedBigInteger('peminjaman_id');
             $table->foreign('peminjaman_id')->references('id')->on('peminjaman')->ondelete('cascade');
             $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('bukus')->ondelete('cascade');
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
        Schema::dropIfExists('detailpinjams');
    }
}
