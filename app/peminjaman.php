<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
      public function petugas()
    {
        return $this->belongsTo('App\petugas', 'petugas_id');
    }

     public function peminjam()
    {
        return $this->belongsTo('App\peminjam', 'peminjam_id');
    }
    public function detail()
    {
        return $this->hasMany('App\detailpinjam','peminjaman_id');
    }
}
