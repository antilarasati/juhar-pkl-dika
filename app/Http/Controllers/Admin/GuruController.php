<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = Guru::all();
        $admin = Auth::guard('admin')->user();
        return view('admin.guru', compact('admin', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:guru,nip|digits::18',
            'email' => 'required|email|unique:guru,email',
            'password' => 'required|min:6',
            'nama_guru' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = null;
        
        if ($request->hasFile('foto')) {
            $uniqueFile = uniqid() . '_' . $request->file('foto')->getClientOriginalName();

            $foto = $request->file('foto')->storeAs('foto_guru', $uniqueFile, 'public');
        }

        Guru::create([
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->password,
            'nama_guru' => $request->nama_guru,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.guru')->with('succes', 'Data Guru Berhasil Di tambah');
    }


    public function delete(Request $request, $id)
    {
        $guru = Guru::find($id);

        $foto =  $guru->foto;

        if (Storage::disk('public')->exists($foto)) {
            Storage::disk('public')->delete($foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru')->with('succes', 'Data Guru Berhasil Di Hapus');
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
        $guru = Guru::find($id);

        $request->validate([
            'nip' => 'required|digits::18|unique:migration_guru,nip,' .$guru->id_guru. ',id_guru',
            'email' => 'required|email|unique:migration_guru,email,' . $guru->id_guru. ',id_guru',
            'password' => 'required|min:6',
            'nama_guru' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = $guru->foto;
        if ($request->hasFile('foto')) {
            if ($foto) {
                Storage::disk('public')->delete('$foto');
            }
            $uniqueFile = uniqid() . '_' . $request->file{'foto'}->getClientOriginalName();
            $request->file('foto')->storeAs('foto_guru', $uniqueFile, 'public');
            $foto = 'foto_guru'.$uniqueFile;
        }

        $guru::update([
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $guru->password,
            'nama_guru' => $request->nama_guru,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.guru')->with('succes', 'Data Guru Berhasil Di Update.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
