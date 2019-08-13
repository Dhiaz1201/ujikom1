<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kartupendaftaran extends Model
{
     protected $fillable = ['kartu_kode', 'kartu_tgl_pembuatan','kartu_tgl_akhir','kartu_status_aktif','petugas_id','peminjam_id'];
	public $timestamps = true;
        public function petugas()
    {
        return $this->belongsTo('App\petugas', 'petugas_id');
    }

     public function peminjam()
    {
        return $this->belongsTo('App\peminjam', 'peminjam_id');
    }
}
