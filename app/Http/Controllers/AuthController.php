<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function proses_login(Request $request) {
        request()->validate(
            [
                'nama' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('nama','password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == "user") {
                return redirect()->intended("user");
            }
            
            return redirect()->intended('/');
        }
        return redirect('login')->with('error', "Anda salah memasukkan nama atau password");
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
