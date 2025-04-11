<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /**
     * Handle GET request to fetch all anggota.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar anggota berhasil diambil.',
            'data' => $anggota
        ], 200);
    }

    /**
     * Handle POST request to store a new anggota.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'tmt' => 'required|date',
        ]);

        $anggota = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota', // Default role anggota
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'tmt' => $request->tmt,
            'status' => 'aktif', // Default status aktif
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Anggota berhasil ditambahkan.',
            'data' => $anggota
        ], 201);
    }
}
