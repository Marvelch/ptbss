<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuStokModel extends Model
{
    protected $table = 'kartustok';

    protected $fillable = [
        'kode_product',
        'tanggal',
        'kode_transaksi',
        'masuk',
        'keluar',
        'saldo',
        'keterangan',
    ];
}
