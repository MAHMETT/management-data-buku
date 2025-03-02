<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allAnggota = Anggota::all();
        return view('anggota.index',compact('allAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valData = request()->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
        ],[
            'nama_anggota.required'=> 'Nama anggota harus diisi',
            'alamat.required'=> 'Alamat harus diisi',
            'no_telpon.required'=> 'No telpon harus diisi',
        ]);

        Alert::toast('Anggota berhasil ditambahkan', 'success')->autoClose(5000);

        Anggota::create($valData);

        return redirect()->route('anggota.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show',compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        return view('anggota.edit',compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $valData = request()->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
        ],[
            'nama_anggota'=> 'Nama anggota harus diisi',
            'alamat.required'=> 'Alamat harus diisi',
            'no_telpon'=> 'No telpon harus diisi',
        ]);

        Alert::toast('Anggota telah berhasil diupdate', 'success')->autoClose(5000);

        $anggota->update($valData);

        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        Alert::toast('Anggota telah berhasil dihapus', 'success')->autoClose(5000);

        $anggota->delete();

        return redirect()->route('anggota.index');
    }
}
