<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaanModel extends Model
{
    protected $table = 'penerimaan';

    protected $fillable = [
                'no_rpo',
                'rel_kodepermintaan',
                'kodepermintaan',
                'status',
                'tanggal',
                'sales_order',
                'delivery_order',
    ];
    
    public function ProductModel()
    {
        return $this->belongsTo('App\ProductModel');
    }

}
