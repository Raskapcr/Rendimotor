<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kucing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KucingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = [''];
        $searchableColumns = [''];

        $pageData['dataKucing'] = Kucing::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(10)
            ->onEachSide(2)
            ->withQueryString();

        foreach ($pageData['dataKucing'] as $kucing) {
            $kucing->foto = $kucing->foto ? Storage::url($kucing->foto) : asset('images/default-kucing.jpg');
        }
        return view('admin.kucing.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kucing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:5120'],
            'ras' => ['required'],
            'usia' => ['required'],
            'jenisKelamin' => ['required', 'in:Jantan,Betina'],
            'deskripsi' => ['nullable'],
        ]);

        $data['nama'] = $request->nama;
        $data['ras'] = $request->ras;
        $data['usia'] = $request->usia;
        $data['jenisKelamin'] = $request->jenisKelamin;
        $data['deskripsi'] = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('kucing', 'public'); // Simpan ke folder "kucing"
            $data['foto'] = $path; // Tambahkan path foto ke data kucing
        } else {
            $data['foto'] = 'images/default-kucing.jpg'; // Gunakan foto default jika tidak ada file
        }

        Kucing::create($data);
        return redirect()->route('kucing.list')->with('success', 'Penambahan Data Berhasil');
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
    public function edit(string $param1)
    {
        $pageData['dataKucing'] = Kucing::findOrFail($param1);
        return view('admin.kucing.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:5120'],
            'ras' => ['required'],
            'usia' => ['required'],
            'jenisKelamin' => ['required', 'in:Jantan,Betina'],
            'deskripsi' => ['nullable'],
        ]);

        $kucing_id = $request->kucing_id;
        $kucing = Kucing::findOrFail($kucing_id);

        $kucing['nama'] = $request->nama;
        $kucing['ras'] = $request->ras;
        $kucing['usia'] = $request->usia;
        $kucing['jenisKelamin'] = $request->jenisKelamin;
        $kucing['deskripsi'] = $request->deskripsi;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kucing->foto && Storage::exists('public/' . $kucing->foto)) {
                Storage::delete('public/' . $kucing->foto);
            }
            // Simpan foto baru
            $path = $request->file('foto')->store('kucing', 'public');
            $kucing->foto = $path;
        }

        $kucing->save();
        return redirect()->route('kucing.list')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $kucing = Kucing::findOrFail($param1);

        // Hapus foto jika ada
        if (!empty($kucing->foto) && Storage::exists($kucing->foto)) {
            Storage::delete($kucing->foto);
        }

        $kucing->delete();
        return redirect()->route('kucing.list')->with('hapus', 'Hapus Data Berhasil');
    }
}
