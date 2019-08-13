<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
     public function peminjaman()
    {
        return $this->hasMany('App\peminjaman', 'peminjam_id');
    }
    public function kartupendaftaran()
    {
        return $this->hasMany('App\kartupendaftaran','peminjam_id');
    }
}
