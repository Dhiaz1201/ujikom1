<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailpinjam extends Model
{
   protected $fillable = ['detail_tgl_kembali', 'detail_denda','detail_status_kembali','peminjaman_id','buku_id'];
	public $timestamps = true;
     public function buku()
    {
        return $this->belongsTo('App\buku','buku_id');
    }

     public function peminjaman()
    {
        return $this->belongsTo('App\peminjaman','peminjaman_id');
    }
}
