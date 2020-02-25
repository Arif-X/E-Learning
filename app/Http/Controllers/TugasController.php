<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Penugasan;
use Auth;
use Carbon\Carbon;
use DB;

class TugasController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function tambahGet($mapel, $kelas, $semester, $pertemuan){
		$tugas = Penugasan::where('mapel', $mapel)
		->where('kelas', $kelas)
		->where('semester', $semester)
		->where('pertemuan_ke', $pertemuan)
		->get();
		return view('siswa.tugas', ['tugas' => $tugas]);
	}

	public function tambahOrEditPost(Request $request){
		$mapel = $request->mapel;
		$kelas = $request->kelas;		
		$semester = $request->semester;
		$pertemuan = $request->pertemuan;

		$time = Carbon::now();

		$terakhir = DB::table('penugasans')
		->orderBy('id', 'desc')
		->where('id', $request->id_penugasan)
		->whereTime('pengumpulan_terakhir', '<=', $time)		
		->first();

		$tersedia = Tugas::join('penugasans', 'penugasans.id', '=', 'tugas.id_penugasan')
		->select('tugas.*', 'penugasans.pengumpulan_terakhir')
		->where('id_penugasan', $request->id_penugasan)
		->whereTime('pengumpulan_terakhir', '<=', $time)
		->first();

		if ($terakhir == null) {
			return back()->with('error', 'Waktu telah habis');
		} else if (Auth::user()->kelas != $request->kelas) {
			return back()->with('error', 'Anda tidak bisa mengupload file dari kelas ini');
		} else {
			if ($tersedia == null) {
				$fileName = $request->file('upload')->getClientOriginalName();
				$request->upload->move(storage_path('app/public/tugas/'.$mapel.'/'.$kelas.'/'.$semester.'/'.$pertemuan), $fileName);
				Tugas::insert([
					'id_penugasan' => $request->id_penugasan,
					'diupload_oleh' => Auth::user()->no_induk,
					'upload' => $fileName,
				]);
				return back()->with('success', 'Tugas telah disubmit');
			} else {
				$fileName = $request->file('upload')->getClientOriginalName();
				$request->upload->move(storage_path('app/public/tugas/'.$mapel.'/'.$kelas.'/'.$semester.'/'.$pertemuan), $fileName);
				Tugas::where('tugas.id_penugasan', $request->id_penugasan)
				->update([
					'upload' => $fileName,
				]);
				return back()->with('info', 'Tugas telah diedit');
			}
		}    	
	}

}
