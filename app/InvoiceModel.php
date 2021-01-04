<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'no_invoice',
        'tanggal',
        'keterangan',		
        'sub_total',
    ];
}
