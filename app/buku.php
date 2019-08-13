<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $fillable = ['buku_kode', 'buku_judul','buku_jumlah','buku_deskripsi','buku_pengarang','buku_tahun_terbit','kategori_id','penerbit_id'];
	public $timestamps = true;
      public function penerbit()
    {
        return $this->belongsTo('App\penerbit','penerbit_id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\kategori','kategori_id');
    }

     public function detail()
    {
        return $this->hasMany('App\detailpinjam','buku_id');
    }
}
