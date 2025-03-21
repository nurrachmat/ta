<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjamans = Pinjaman::all();
        return view('pinjaman.index', compact('pinjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'anggota')->get(); // Ambil user dengan role anggota saja
        return view('pinjaman.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jumlah_pinjaman' => 'required|numeric',
            'tanggal_pinjam' => 'required|date',
            'jenis_pinjaman' => 'required|string|max:255',
        ]);

        Pinjaman::create([
            'user_id' => $request->user_id,
            'admin_id' => auth()->user()->id, // Ambil admin_id dari user yang sedang login
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jenis_pinjaman' => $request->jenis_pinjaman,
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjaman $pinjaman)
    {
        return view('pinjaman.show', compact('pinjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjaman $pinjaman)
    {
        $users = User::where('role', 'anggota')->get(); // Ambil user dengan role anggota saja
        return view('pinjaman.edit', compact('pinjaman', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jumlah_pinjaman' => 'required|numeric',
            'tanggal_pinjam' => 'required|date',
            'jenis_pinjaman' => 'required|string|max:255',
        ]);

        $pinjaman->update([
            'user_id' => $request->user_id,
            'admin_id' => auth()->user()->id, // Ambil admin_id dari user yang sedang login
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jenis_pinjaman' => $request->jenis_pinjaman,
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();

        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dihapus.');
    }
}
