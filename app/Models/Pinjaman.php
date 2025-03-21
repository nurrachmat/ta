<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $fillable = [
        'user_id',
        'admin_id',
        'jumlah_pinjaman',
        'tanggal_pinjam',
        'jenis_pinjaman',
    ];

    // Relasi dengan tabel users untuk user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan tabel users untuk admin
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
