<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;
use App\Penugasan;
use Auth;

class ModulController extends Controller
{
	public function daftarModul($mapel, $kelas, $semester, $pertemuan){
		if(Auth::user()->status == 'Siswa'){
			$modul = Modul::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->where('pertemuan_ke', $pertemuan)
			->get();
			return view('siswa.modul', ['mapel' => $modul]);
		} else {
			$modul = Modul::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->where('pertemuan_ke', $pertemuan)
			->get();
			return view('guru.modul', ['mapel' => $modul]);
		}    	
	}

	public function detailModulDanPenugasan($mapel, $kelas, $semester, $pertemuan){
		if(Auth::user()->status == 'Siswa'){
			return back();
		} else {
			$tugas = Penugasan::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->where('pertemuan_ke', $pertemuan)
			->get();
			$modul = Modul::where('mapel', $mapel)
			->where('kelas', $kelas)
			->where('semester', $semester)
			->where('pertemuan_ke', $pertemuan)
			->get();
			return view('guru.detail-modul', ['mapel' => $modul, 'penugasan' => $tugas]);
		}
	}

	public function addOrEditModul(Request $request){
		$mapel = $request->mapel;
		$kelas = $request->kelas;		
		$semester = $request->semester;
		$pertemuan = $request->pertemuan;

		$tersedia = Modul::where('nama', $request->nama)
		->where('pertemuan_ke', $request->pertemuan_ke)
		->where('mapel', $request->mapel)
		->where('kelas', $request->kelas)
		->where('semester', $request->semester)
		->first();

		if(Auth::user()->status == 'Siswa'){
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		} else {
			if (Auth::user()->kelas == $request->kelas){
				if ($tersedia == null) {
					$fileName = $request->file('upload')->getClientOriginalName();
					$request->upload->move(storage_path('app/public/modul/'.$mapel.'/'.$kelas.'/'.$semester.'/'.$pertemuan), $fileName);
					Modul::insert([
						'nama' => $request->nama,
						'pertemuan_ke' => $request->pertemuan_ke,
						'mapel' => $request->mapel,
						'kelas' => $request->kelas,
						'semester' => $request->semester,
						'modul' => $request->nama,
						'file' => $fileName,
						'keterangan' => $request->keterangan,
					]);
					return back()->with('success', 'Modul telah ditambah');
				} else {
					$fileName = $request->file('upload')->getClientOriginalName();
					$request->upload->move(storage_path('app/public/modul/'.$mapel.'/'.$kelas.'/'.$semester.'/'.$pertemuan), $fileName);
					Modul::where('pertemuan_ke', $request->pertemuan_ke)
					->where('mapel', $request->mapel)
					->where('kelas', $request->kelas)
					->where('semester', $request->semester)
					->update([
						'nama' => $request->nama,
						'pertemuan_ke' => $request->pertemuan_ke,
						'mapel' => $request->mapel,
						'kelas' => $request->kelas,
						'semester' => $request->semester,
						'modul' => $request->nama,
						'file' => $fileName,
						'keterangan' => $request->keterangan,
					]);
					return back()->with('success', 'Modul telah diedit');
				}
			} else {
				return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
			}
			
		}
	}

}
