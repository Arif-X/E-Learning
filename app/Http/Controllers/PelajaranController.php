<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;
use App\Modul;
use Auth;
use DB;

class PelajaranController extends Controller
{

	public function __construct(){
		$this->middleware('auth');	
	}

	public function pelajaran(){
		if(Auth::user()->status == 'Siswa'){
			$pelajaran = Pelajaran::where('kelas', Auth::user()->kelas)
			->paginate(6);
			return view('siswa.pelajaran', ['pelajaran' => $pelajaran]);
		} else {
			$pelajaran = Pelajaran::where('mapel', Auth::user()->kelas)
			->paginate(6);
			return view('guru.pelajaran', ['pelajaran' => $pelajaran]);
		}
	}

	public function pelajaranAll(){
		if(Auth::user()->status == 'Siswa'){
			$pelajaran = Pelajaran::paginate(6);
			return view('siswa.pelajaran', ['pelajaran' => $pelajaran]);
		} else {
			$pelajaran = Pelajaran::paginate(6);
			return view('guru.pelajaran', ['pelajaran' => $pelajaran]);
		}
	}

	public function pelajaranKelas($kelas){
		if(Auth::user()->status == 'Siswa'){
			$pelajaran = Pelajaran::where('kelas', $kelas)
			->paginate(6);
			return view('siswa.pelajaran', ['pelajaran' => $pelajaran]);
		} else {
			$pelajaran = Pelajaran::where('kelas', $kelas)
			->paginate(6);
			return view('guru.pelajaran', ['pelajaran' => $pelajaran]);
		}
	}

	public function lihat($mapel, $kelas, $semester){
		if(Auth::user()->status == 'Siswa'){
			$modul = Modul::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->get();
			return view('siswa.mapel', ['mapel' => $modul]);
		} else {
			$modul = Modul::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->get();
			return view('siswa.mapel', ['mapel' => $modul]);
		}
	}
}
