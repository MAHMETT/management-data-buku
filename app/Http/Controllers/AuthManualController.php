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
        Alert::success('Selamat!', 'Anda telah berhasil login');
            return redirect()->route('dashboard');
        }

        // Alert::alert('Gagal', 'Email atau Password anda salah', 'error');
        Alert::toast('Email atau Password anda salah', 'error')->autoClose(5000);
        
        return back();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // alert
        Alert::toast('Anda telah logout', 'success')->autoClose(5000);

        // kemungkinan bakal error
        return redirect()->route('login');
    }
}
