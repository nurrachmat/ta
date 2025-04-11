<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Handle GET request to fetch all pinjaman.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $pinjaman = Pinjaman::with(['user', 'admin'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar pinjaman berhasil diambil.',
            'data' => $pinjaman
        ], 200);
    }
}
