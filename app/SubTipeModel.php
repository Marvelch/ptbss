<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTipeModel extends Model
{
    protected $table = 'subtype';
    protected $fillable = [
        'nama','kode','status','tipeid'
    ];
}
