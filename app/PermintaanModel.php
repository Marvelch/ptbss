<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermintaanModel extends Model
{
    protected $table = 'permintaan';

    protected $fillable = [
        'id',
        'kodepermintaan',
        'tglpermintaan',
        'jumlah',
        'harga',
        'subtotal',
        'supplier_id',
        'product_id',
        'diterima',
        'sisa'
    ];

}
