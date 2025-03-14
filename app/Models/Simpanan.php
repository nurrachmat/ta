<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_simpanan_id',
        'tanggal_simpan',
        'admin_id',
    ];

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan tabel users untuk admin
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // Relasi dengan tabel jenis_simpanans
    public function jenisSimpanan()
    {
        return $this->belongsTo(Jenis_simpanan::class, 'jenis_simpanan_id');
    }
}
