<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{

    public function siswa($id)
    {
        $siswa = Guru::where('id_pembimbing', $id)->get();
        $siswa = Guru::where('id_pembimbing', '$id')->first();
        return view('admin.siswa', compact('siswa', 'siswa', 'id'));
    }

    public function create($id)
    {
        return view('admin.tambah_siswa', compact('id'));
    }

    public function store(Request $request, string $id)
    {
        $request->validate([
            'nisn' => 'required|enique:migration_siswa,nisn|digits:10',
            'password' => 'required|min:8',
            'nama_admin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' ,
        
       ]);

       $foto = null;

       if ($request->hasFile('foto')) {
           $uniqueFile = uniqid() . '_' . $request->file('foto')->getClientOriginalName();
        
           $request->file('foto')->storeAs('foto_siswa', $uniqueFile, 'public');
           $foto = 'foto_siswa/' . $uniqueFile;
       }

       Siswa::create([
            'id_pembimbing' =>$id,
            'nisn' =>$request->nisn,
            'password' =>Hash::make
       ])
    }
}