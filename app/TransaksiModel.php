<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'kodepenerimaan',
        'tanggal',
        'idsupplier',
        'idproducts',
        'qty',
        'subtotal',
    ];
}
