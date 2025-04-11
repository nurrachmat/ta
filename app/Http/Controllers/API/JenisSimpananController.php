<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jenis_simpanan;
use Illuminate\Http\Request;

class JenisSimpananController extends Controller
{
    /**
     * Handle GET request to fetch all jenis simpanan.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $jenisSimpanan = Jenis_simpanan::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar jenis simpanan berhasil diambil.',
            'data' => $jenisSimpanan
        ], 200);
    }

    /**
     * Handle POST request to store a new jenis simpanan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_simpanan' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
        ]);

        $jenisSimpanan = Jenis_simpanan::create([
            'nama_jenis_simpanan' => $request->nama_jenis_simpanan,
            'nominal' => $request->nominal,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jenis simpanan berhasil ditambahkan.',
            'data' => $jenisSimpanan
        ], 201);
    }
}
