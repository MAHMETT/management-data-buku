<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPenerbit = Penerbit::all();
        return view('penerbit.index',compact('allPenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100'
        ]);

        // simpan data
        Penerbit::create($validatedData);

        // redirect ke index penerbit
        return redirect()->route('penerbit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        // buat validasi
        $validatedData = $request->validate([
            'nama_penerbit' => 'required|max:100'
        ]);

        // update data
        $penerbit->update($validatedData);

        // redirect ke index penerbit
        return redirect()->route('penerbit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();
        // redirect ke index penerbit
        return redirect()->route('penerbit.index');
    }
}
