<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login-form');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email_user = $googleUser->email;

        $user = User::where('email', $email_user)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            $result = 'error';
        }

        return redirect()->route('hal-login')->with('result', $result);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required'], // Pastikan role juga ada
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ada dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user
            Auth::login($user);

            // Cek role user setelah login
            if ($user->role == 'Pelanggan') {
                return redirect()->route('home'); // Arahkan ke halaman home untuk Pelanggan
            } elseif ($user->role == 'Administrator') {
                return redirect()->route('dashboard'); // Arahkan ke dashboard untuk Administrator
            } else {
                // Jika role tidak cocok
                Auth::logout();
                return redirect()->route('hal-login')->with('error', 'Role tidak valid');
            }
        } else {
            // Jika email atau password salah
            return redirect()->route('hal-login')->with('error', 'Email atau password salah');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_forgot_password()
    {
        return redirect()->route('auth.forgot');
    }

    public function do_forgot_password(Request $request)
    {
        $request->validate([
            'password' => [
                'required', // Wajib diisi
                'min:3', // Minimal 3 karakter
                'regex:/[A-Z]/', // Harus mengandung setidaknya 1 huruf besar
            ],
        ]);
        $pageData['password'] = $request->password;
        $pageData['confirm_password'] = $request->confirm_password;

        if ($request->password == 'L12345' && $request->confirm_password == 'L12345') {
            $result = 'success';
            return redirect()->route('hal-login')->with('success', 'Link reset password sudah dikirim ke lulu23si@mahasiswa.pcr.ac.id, silahkan
            akses dan ikuti langkah yang tersedia!');
        } else {
            Session::flush();
            return redirect()->route('hal-login')->with('error', 'Email yang dimasukkan tidak valid!');
            $result = 'error';
        }
        return redirect('/auth')->with('result', '$result');
        $pageData['result'] = $result;
        return view('login-form', $pageData);
    }

//     public function index()
//     {
//         $pageData['dataVendor'] = Vendor::all();
//         return view('admin.vendor.index', $pageData);
//     }

//     public function create()
//     {
//         return view('admin.vendor.create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama_vendor' => ['required'],
//             'kontak' => ['required'],
//             'alamat' => ['required'],
//             'jenis_vendor' => ['required', 'in:Distributor,Pemasok,Konsultan'],
//             'lokasi' => ['required'],
//             'tgl_kontrak' => ['required', 'date'],
//         ]);
//         $data['nama_vendor'] = $request->nama_vendor;
//         $data['kontak'] = $request->kontak;
//         $data['alamat'] = $request->alamat;
//         $data['jenis_vendor'] = $request->jenis_vendor;
//         $data['lokasi'] = $request->lokasi;
//         $data['tgl_kontrak'] = $request->tgl_kontrak;

//         Vendor::create($data);
//         return redirect()->route('vendor.list')->with('success', 'Penambahan Data Berhasil!');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $param1)
//     {
//         $pageData['dataVendor'] = Vendor::findOrFail($param1);
//         return view('admin.vendor.edit', $pageData);
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request)
//     {
//         $request->validate([
//             'nama_vendor' => ['required'],
//             'kontak' => ['required'],
//             'alamat' => ['required'],
//             'jenis_vendor' => ['required', 'in:Distributor,Pemasok,Konsultan'],
//             'lokasi' => ['required'],
//             'tgl_kontrak' => ['required', 'date'],
//         ]);
//         $vendor_id = $request->vendor_id;
//         $data = Vendor::findOrFail($vendor_id);

//         $data['nama_vendor'] = $request->nama_vendor;
//         $data['kontak'] = $request->kontak;
//         $data['alamat'] = $request->alamat;
//         $data['jenis_vendor'] = $request->jenis_vendor;
//         $data['lokasi'] = $request->lokasi;
//         $data['tgl_kontrak'] = $request->tgl_kontrak;

//         $data->save();
//         return redirect()->route('vendor.list')->with('success', 'Perubahan Data Berhasil!');

//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $param1)
//     {
//         $data = Vendor::findOrFail($param1);
//         $data->delete();

//         return redirect()->route('vendor.list')->with('delete', 'Penghapusan Data Berhasil!');
//     }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('hal-login');
    }
}
