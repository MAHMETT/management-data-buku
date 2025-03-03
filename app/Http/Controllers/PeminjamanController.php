<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPeminjaman = Peminjaman::all();

        return view('peminjaman.index', compact('allPeminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $anggota = Anggota::all();
            $bukus = Buku::all();

        return view('peminjaman.create', compact('anggota','bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valData = $request->validate([
            'tgl_peminjaman' => 'required|date',
            'anggota_id' => 'required',
            'buku_ids' => 'required|array',
            'buku_ids.*' => 'exists:bukus,id'
        ],[
            'anggota_id.required' => 'Anggota harus dipilih',
            'buku_ids.required' => 'Buku harus dipilih',
        ]);

        $peminjaman = Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'status_peminjaman' => 'Dipinjam',
        ]);
        Alert::toast('Peminjaman Berhasil ditambahkan', 'success')->autoClose(5000);
        $peminjaman->buku()->attach($request->buku_ids);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::with('anggota','buku')->findOrFail($id);

        return view('peminjaman.show',compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $anggota = Anggota::all();
        $bukus = Buku::all();
        return view('peminjaman.edit',compact('peminjaman','anggota','anggota','bukus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate(['tgl_peminjaman' => 'date']);

        $peminjaman = Peminjaman::find($peminjaman->id);

        $peminjaman->update([
            'tgl_peminjaman' => $request->tgl_kembali,
            'status_peminjaman' => 'Dikembalikan',
        ]);
        Alert::toast('Berhasil mengembalikan buku', 'success')->autoClose(5000);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        Alert::toast('Berhasil menghapus peminjaman', 'success')->autoClose(5000);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index');
    }
}
