<?php

namespace App\Http\Controllers;

use index;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['jenis_kemitraan'];
        $searchableColumns = ['nama_mitra'];
        $pageData['dataMitra'] = Mitra::filter($request, $filterableColumns, $searchableColumns)
                                                ->paginate(7)
                                                ->withQueryString();
        return view('admin.mitra.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $request->validate([
            'nama_mitra' => ['required', 'max:200'],
            'alamat' => ['nullable'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'numeric'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tgl_bergabung' => ['required','date'],
            'agreement' => ['accepted'],
        ]);

        $data['nama_mitra'] = $request->nama_mitra;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['jenis_kemitraan'] = $request->jenis_kemitraan;
        $data['tgl_bergabung'] = $request->tgl_bergabung;

        Mitra::create($data);

        return redirect()->route('mitra.list')->with('success', 'Penambahan Data Berhasil');
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
        $dataMitra = Mitra::findOrFail($param1);
        return view('admin.mitra.edit', compact ('dataMitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama_mitra' => ['required', 'max:200'],
            'alamat' => ['nullable'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'numeric'],
            'jenis_kemitraan' => ['required', 'in:Platinum,Gold,Silver'],
            'tgl_bergabung' => ['required','date'],
        ]);

        $mitra_id = $request->mitra_id;
        $mitra = Mitra::findOrFail($mitra_id);

        $mitra['nama_mitra'] = $request->nama_mitra;
        $mitra['alamat'] = $request->alamat;
        $mitra['email'] = $request->email;
        $mitra['phone'] = $request->phone;
        $mitra['jenis_kemitraan'] = $request->jenis_kemitraan;
        $mitra['tgl_bergabung'] = $request->tgl_bergabung;

        $mitra->save();

        return redirect()->route('mitra.list')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $mitra = Mitra::findOrFail($param1);

        $mitra->delete();

        return redirect()->route('mitra.list')->with('delete', 'Penghapusan Data Berhasil');
    }
}
