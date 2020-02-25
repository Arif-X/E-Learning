<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penugasan;
use App\Tugas;
use Auth;
use DB;

class PenugasanController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function tambah(Request $request){
        if (Auth::user()->status == 'Siswa') {
            return back()->with('error', 'Anda Tidak Memiliki Akses Tersebut');
        } else {
            $terakhir = $request->tanggal." ". $request->waktu.":00";
            Penugasan::insert([
                'kelas' => $request->kelas,
                'mapel' => $request->mapel,
                'semester' => $request->semester,
                'pertemuan_ke' => $request->pertemuan,
                'detail' => $request->deskripsi,
                'pengumpulan_terakhir' => $terakhir
            ]);
            return back();
        }    	
    }

    public function edit(Request $request) {
        if (Auth::user()->status == 'Siswa') {
            return back()->with('error', 'Anda Tidak Memiliki Akses Tersebut');
        } else {
            Penugasan::where('id', $request->id)
            ->update([
              'kelas' => $request->kelas,
              'mapel' => $request->mapel,
              'semester' => $request->semester,
              'pertemuan_ke' => $request->pertemuan,
              'deskripsi' => $request->deskripsi,
              'pengumpulan_terakhir' => $request->pengumpulan_terakhir,
          ]);
            return back();
        }
    }

    public function hapus($id) {
        if (Auth::user()->status == 'Siswa'){
            return back()->with('error', 'Anda Tidak Memiliki Akses Tersebut');
        } else {
            Penugasan::where('id', $id)->delete();
            return back();
        }
    }

    public function lihatResponse($kelas, $mapel, $semester, $pertemuan){
        if(Auth::user()->status == 'Siswa'){
            return back()->with('error', 'Anda Tidak Memiliki Akses Tersebut');
        } else {
            Tugas::where('kelas', $kelas)
            ->where('mapel', $mapel)
            ->where('semester', $semester)
            ->where('pertemuan', $pertemuan)    	
            ->get();
            return view('response-tugas');
        }
    }

}
