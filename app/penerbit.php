<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penerbit extends Model
{
     public function buku()
    {
        return $this->hasMany('App\buku','penerbit_id');
    }
}
