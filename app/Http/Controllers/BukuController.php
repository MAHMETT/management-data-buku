<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');


        if ($query) {
            $allBuku = Buku::when($query, function($queryBuilder) use ($query){
                $queryBuilder->where('judul', 'like', '%' . $query . '%')
                ->orWhere('pengarang', 'like', '%' . $query . '%')
                ->orWhere('tahun_terbit', 'like', '%' . $query . '%');
            })->paginate(5);

            $allBuku->appends(['q' => $query]);
        } else {
            $allBuku = Buku::latest()->paginate(5);
        }

        // $allBuku = Buku::all();


        return view('buku.index',compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.create' , compact('penerbit' , 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'judul.required'=> 'Judul buku harus diisi',
            'pengarang.required'=> 'Pengarang harus diisi',
            'tahun_terbit.required'=> 'Tahun terbit harus diisi',
            'penerbit_id.required'=> 'Penerbit harus dipilih',
            'kategori_id.required'=> 'Kategori harus dipilih',
        ]);

        if ($request->hasFile('file_cover')) {
            $validatedData['cover'] = $request->file('file_cover')->store('cover', 'public');
        }
        unset($validatedData['file_cover']);

        // simpan data
        // Alert::success('Selamat!', 'Buku telah berhasil ditambahkan');
        Alert::toast('Buku telah berhasil ditambahkan', 'success')->autoClose(5000);
        Buku::create($validatedData);

        // redirect ke index buku
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku' , 'penerbit' , 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        // buat validasi
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'judul.required'=> 'Judul buku harus diisi',
            'pengarang.required'=> 'Pengarang harus diisi',
            'tahun_terbit.required'=> 'Tahun terbit harus diisi',
            'penerbit_id.required'=> 'Penerbit harus dipilih',
            'kategori_id.required'=> 'Kategori harus dipilih',
        ]);

        if ($request->hasFile('file_cover')) {
            $validatedData['cover'] = $request->file('file_cover')->store('cover', 'public');

            if ($request->cover_lama) {
                Storage::delete('public/' . $request->cover_lama);
            }
        }
        unset($validatedData['file_cover']);

        // update data
        // Alert::success('Selamat!', 'Buku telah berhasil diupdate');
        Alert::toast('Buku telah berhasil diupdate', 'success')->autoClose(5000);
        $buku->update($validatedData);

        // redirect ke index buku
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }

        // proses delete
        $buku->delete();
        // Alert::success('Selamat!', 'Buku telah berhasil dihapus');
        Alert::toast('Buku telah berhasil dihapus', 'success')->autoClose(5000);
        // redirect ke index buku
        return redirect()->route('buku.index');
    }
}
