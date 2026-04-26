<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['role'];
        $searchableColumns = ['name'];
        $pageData['dataUser'] = User::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(7)
            ->withQueryString();

        foreach ($pageData['dataUser'] as $user) {
            $user->photo = $user->photo ? Storage::url($user->photo) : asset('images/default.jpg');
        }
        return view('admin.user.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
            'photo' => ['nullable','image','mimes:jpg,jpeg,png','max:5120'],
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public'); // Simpan ke folder "profile"
            $data['photo'] = $path; // Tambahkan path photo ke data profile
        } else {
            $data['photo'] = 'images/default-profile.jpg'; // Gunakan photo default jika tidak ada file
        }

        User::create($data);
        return redirect()->route('user.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataUser'] = User::findOrFail($param1);
        return view('admin.user.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
            'photo' => ['nullable','image','mimes:jpg,jpeg,png','max:5120'],
        ]);
        $id = $request->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        if ($request->hasFile('photo')) {
            // Hapus photo lama jika ada
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
            // Simpan photo baru
            $path = $request->file('photo')->store('profile', 'public');
            $user->photo = $path;
        }

        $user->save();
        return redirect()->route('user.list')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = User::findOrFail($param1);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
