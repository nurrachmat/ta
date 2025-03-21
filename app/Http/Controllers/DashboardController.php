<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Simpanan;
use App\Models\Jenis_simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Menghitung jumlah pinjaman dari bulan 01 sd 12 di tahun 2025
        $jumlahPinjamanPerBulan = DB::table('pinjamen')
            ->select(DB::raw('MONTH(tanggal_pinjam) as bulan'), DB::raw('SUM(jumlah_pinjaman) as total'))
            ->whereYear('tanggal_pinjam', 2025)
            ->groupBy(DB::raw('MONTH(tanggal_pinjam)'))
            ->pluck('total', 'bulan')->toArray();

        // Mengirim data statistik ke view dashboard
        return view('dashboard', compact('totalUsers', 'totalSimpanan', 'totalJenisSimpanan', 'totalNominalSimpanan', 'jumlahPinjamanPerBulan'));
    }
}