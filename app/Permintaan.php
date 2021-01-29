<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'Permintaan';

    public function Product(){
        return $this->belongsTo('App\product');
    }

    public function Supplier(){
        return $this->belongsTo('App\supplier');
    }
}
