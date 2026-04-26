<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;

class BengkelController extends Controller
{
    // Menampilkan form login
    public function showLogin()
    {
        return view('login-bengkel');
    }

    // Proses login
    public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email', // Validasi email
            'password' => 'required|string', // Validasi password
        ]);
        return view('home-bengkel');
    }

    // Menampilkan form registrasi
    public function showRegister()
    {
        return view('registrasi-bengkel');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|alpha|max:255', // Nama tidak boleh ada angka
            'alamat' => 'required|max:300', // Alamat maksimal 300 karakter
            'tanggal_lahir' => 'required|date', // Tanggal Lahir harus berupa Date
            'password' => ['required'],
        ], [
            'password.confirmed' => 'Confirm Password tidak sesuai', // Pesan error khusus untuk confirm password
        ]);

        // Cek jika password dan password_confirmation sama
        if ($request->password !== $request->password_confirmation) {
            return redirect()->route('register')->with('error', 'Confirm Password tidak sesuai');
        } else {
            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan Login');
        }

        // Membuat pengguna baru
        User::create([
            'username' => $request->username,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password), // Hash password
        ]);

    }
    public function storeRegis(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        User::create($data);
        return redirect()->route('hal-login')->with('success', 'Registrasi Berhasil!');
    }
}
