<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'nama','id','harga','stok','kode','type_id','status','subid'
    ];

    public function PenerimaanModel()
    {
        return $this->hasMany('App\PenerimaanModel');
    }
}
