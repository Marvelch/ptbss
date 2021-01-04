<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PermintaanModel;

class Product extends Model
{
   public function Permintaan()
   {
      return $this->belongsTo('App\PermintaanModel');
   }
   
}
