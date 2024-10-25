<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kegiatan;
use App\Models\Admin\Kegitan;
use App\Models\Admin\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function kegiatan($id, $id_siswa)
    {
        $loginGuru = Auth::guard('guru')->user()->id_guru;

        $siswa = Auth::find($id_siswa);

        if (!$siswa || !$siswa->id_pembimbing) {
            return back()->withErrors(['access' => "Siswa Tidak Ditemukan Atau TIdak Memiliki Pembimbing."]);
        }

        if ($siswa->id_pembimbing != $id) {
            return back()->withErrors(['access' => 'Pembimbing Tidak Sesuai']);
        }

        $pembimbing = Pembimbing::find($id);

        if (!$pembimbing || $pembimbing->id_guru !== $loginGuru) {
            return back()->withErrors(['access' => 'Akses Anda Di Tolak. Siswa ini tidak Dibimbing Oleh Anda.']);
        }

        $kegiatan = Kegiatan::where('id_siswa', $id_siswa)->get();
        return view('guru.kegiatan', compact('kegiatans'));
    }
   
    public function detail($id, $id_siswa, $id_kegiatan)
    {
        $loginGuru = Auth::guard('guru')->user()->id_guru;

        $siswa = Auth::find($id_siswa);

        if (!$siswa || !$siswa->id_pembimbing) {
            return back()->withErrors(['access' => "Siswa Tidak Ditemukan Atau TIdak Memiliki Pembimbing."]);
        }

        if ($siswa->id_pembimbing != $id) {
            return back()->withErrors(['access' => 'Pembimbing Tidak Sesuai']);
        }

        $pembimbing = Pembimbing::find($id);

        if (!$pembimbing || $pembimbing->id_guru !== $loginGuru) {
            return back()->withErrors(['access' => 'Akses Anda Di Tolak. Siswa ini tidak Dibimbing Oleh Anda.']);
        }

        $kegiatan = Kegiatan::where('id_siswa', $id_siswa)->get();
        $id_pembimbing = $id;

        return view('guru.kegiatan', compact('id_pembimbing','kegiatans', 'kegiatan'));
    }

    public function detailKegiatan()
    {

    }
}
