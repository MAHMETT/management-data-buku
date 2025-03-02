<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKategori = Kategori::all();
        return view('kategori.index',compact('allKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100'
        ],[
            'nama_kategori.required'=> 'Nama kategori harus diisi',
        ]);
        Alert::toast('Berhasil menambahkan kategori', 'success')->autoClose(5000);
        // simpan data
        Kategori::create($validatedData);

        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // buat validasi
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:100'
        ],[
            'nama_kategori.required'=> 'Nama kategori harus diisi',
        ]);

        Alert::toast('Berhasil mengupdate kategori', 'success')->autoClose(5000);
        // update data
        $kategori->update($validatedData);

        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        // redirect ke index kategori
        return redirect()->route('kategori.index');
    }
}
