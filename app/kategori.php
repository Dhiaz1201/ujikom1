<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
     public function buku()
    {
        return $this->hasMany('App\buku','kategoti_id');
    }
}
