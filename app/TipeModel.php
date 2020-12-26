<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeModel extends Model
{
    protected $table = 'types';
    protected $fillable = [
        'nama','kode','status'
    ];
}
