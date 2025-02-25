<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthManualController extends Controller
{

    public function index(){
        return view('manual-auth.login');
    }
    public function loginProsses(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email harus benar',
            'password.required' => 'Password wajub diisi',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('kategori.index');
        }

        // Alert::alert('Gagal', 'Email atau Password anda salah', 'error');
        Alert::error('Gagal', 'Email atau Password anda salah');
        
        return back();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // kemungkinan bakal error
        return redirect()->route('login');
    }
}
