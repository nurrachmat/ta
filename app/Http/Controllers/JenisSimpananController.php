<?php

namespace App\Http\Controllers;

use App\Models\Jenis_simpanan;
use Illuminate\Http\Request;

class JenisSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_simpanan = Jenis_simpanan::all(); 
        // panggil Model Jenis_simpanan, all() = select * from jenis_simpanans
        return view('jenis_simpanan.index', compact('jenis_simpanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_simpanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_simpanan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
        ]);

        Jenis_simpanan::create([
            'nama_jenis_simpanan' => $request->nama_jenis_simpanan,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('jenis_simpanan.index')->with('success', 'Jenis Simpanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis_simpanan $jenis_simpanan)
    {
        return view('jenis_simpanan.show', compact('jenis_simpanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis_simpanan $jenis_simpanan)
    {
        return view('jenis_simpanan.edit', compact('jenis_simpanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis_simpanan $jenis_simpanan)
    {
        $request->validate([
            'nama_jenis_simpanan' => 'required|string|max:255',
            'nominal' => 'required|numeric',
        ]);

        $jenis_simpanan->update([
            'nama_jenis_simpanan' => $request->nama_jenis_simpanan,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('jenis_simpanan.index')->with('success', 'Jenis Simpanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis_simpanan $jenis_simpanan)
    {
        $jenis_simpanan->delete();

        return redirect()->route('jenis_simpanan.index')->with('success', 'Jenis Simpanan berhasil dihapus.');
    }
}
