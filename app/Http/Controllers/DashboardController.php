<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     // if (! Auth::check()){
    //     //     return redirect()->route('hal-login')->with('eror', 'Silahkan Login Terlebih Dahulu!');
    //     // }
    //     return view('admin.dashboard');
    // }

    public function dashboard()
    {
        $totalPelanggan = Pelanggan::count();
        $totalMitra = Mitra::count();
        $totalUser = User::count();
        $totalProduct = Product::count();

        // Ambil 3 pelanggan terbaru
        $recentPelanggan = Pelanggan::orderBy('created_at', 'desc')->take(8)->get();
        $recentProduct = Product::select('nama_produk', 'foto', 'stok')->get();


        // Kirim data ke view
        return view('admin.dashboard', compact('totalPelanggan', 'totalMitra', 'totalUser', 'totalProduct', 'recentPelanggan', 'recentProduct'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
