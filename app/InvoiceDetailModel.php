<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetailModel extends Model
{
    protected $table = "invoice_detail";

    protected $fillable = [
        'id',
        'rel_no_invoice',
        'jumlah',
        'total',
        'harga',	
        'product_id',
    ];
}
