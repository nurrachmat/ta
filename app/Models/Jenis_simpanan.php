<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_simpanan extends Model
{
    protected $fillable = [
        'nama_jenis_simpanan',
        'nominal',
    ];
}
