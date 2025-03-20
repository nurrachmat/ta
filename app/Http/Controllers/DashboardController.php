<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Simpanan;
use App\Models\Jenis_simpanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index()
    {
        // Menghitung jumlah total pengguna
        $totalUsers = User::count();

        // Menghitung jumlah total simpanan
        $totalSimpanan = Simpanan::count();

        // Menghitung jumlah total jenis simpanan
        $totalJenisSimpanan = Jenis_simpanan::count();

        // Menghitung total nominal simpanan
        $totalNominalSimpanan = Simpanan::join('jenis_simpanans', 'simpanans.jenis_simpanan_id', '=', 'jenis_simpanans.id')
            ->sum('jenis_simpanans.nominal');

        // Mengirim data statistik ke view dashboard
        return view('dashboard', compact('totalUsers', 'totalSimpanan', 'totalJenisSimpanan', 'totalNominalSimpanan'));
    }
}