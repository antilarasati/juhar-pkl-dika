<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\NullableType;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $profile = Auth::guard('admin')->user();
      return view('admin.profile', compact('profile'));
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
       $id_admin = Auth::guard('admin')->user()->id_admin;
       $admin = Admin::find($id_admin);

       $request->validate([
            'username' => 'required|enique:admin,username,' .$id_admin . 'id_admin',
            'password' => 'nullable|min:6',
            'nama_admin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048' ,
        
       ]);

       $foto = $admin->foto;
       if ($request->hasFile('foto')) {
           if ($foto) {
               Storage::disk('public')->delete('$foto');
           }
           $uniqueFile = uniqid() . '_' . $request->file{'foto'}->getClientOriginalName();
           $request->file('foto')->storeAs('foto_admin', $uniqueFile, 'public');
           $foto = 'foto_admin'.$uniqueFile;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
