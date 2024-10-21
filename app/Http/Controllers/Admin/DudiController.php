<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Dudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DudiController extends Controller
{
    public function dudi()
    {
        $dudis = Dudi::all();
        $admin = Auth::guard('admin')->user();
        return view('admin.dudi', compact('admin', 'dudis'));
    }

    public function create()
    {
        return view('admin.tambah_dudi');
    }

public function store(Request $request)
{

    $request->validate([
        'nama_dudi' => 'required',
        'alamat' => 'required',
    ]);

    
}
}
