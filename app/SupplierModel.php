<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';

    protected $fillable = [
        'kode','nama','alamat','kota','status','notelpon','fax','pic'
    ];
}
