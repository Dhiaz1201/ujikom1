<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
      public function peminjaman()
    {
        return $this->hasMany('App\peminjaman','petugas_id');
    }
     public function kartupendaftaran()
    {
        return $this->hasMany('App\kartupendaftaran','petugas_id');
    }
}
