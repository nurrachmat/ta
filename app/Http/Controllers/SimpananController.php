<?php

namespace App\Http\Controllers;

use App\Models\Jenis_simpanan;
use App\Models\User;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simpanans = Simpanan::all();
        return view('simpanan.index', compact('simpanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'anggota')->get(); // Ambil user dengan role anggota saja
        $jenis_simpanans = Jenis_simpanan::all();
        return view('simpanan.create', compact('users', 'jenis_simpanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jenis_simpanan_id' => 'required|exists:jenis_simpanans,id',
            'tanggal_simpan' => 'required|date',
        ]);

        Simpanan::create([
            'user_id' => $request->user_id,
            'jenis_simpanan_id' => $request->jenis_simpanan_id,
            'tanggal_simpan' => $request->tanggal_simpan,
            'admin_id' => auth()->user()->id, // Ambil admin_id dari user yang sedang login
        ]);

        return redirect()->route('simpanan.index')->with('success', 'Simpanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Simpanan $simpanan)
    {
        return view('simpanan.show', compact('simpanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Simpanan $simpanan)
    {
        return view('simpanan.edit', compact('simpanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jenis_simpanan_id' => 'required|exists:jenis_simpanans,id',
            'tanggal_simpan' => 'required|date',
        ]);

        $simpanan->update([
            'user_id' => $request->user_id,
            'jenis_simpanan_id' => $request->jenis_simpanan_id,
            'tanggal_simpan' => $request->tanggal_simpan,
            'admin_id' => auth()->user()->id, // Ambil admin_id dari user yang sedang login
        ]);

        return redirect()->route('simpanan.index')->with('success', 'Simpanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('simpanan.index')->with('success', 'Simpanan berhasil dihapus.');
    }
}
