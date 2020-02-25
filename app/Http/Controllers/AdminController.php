<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		if (Auth::user()->status == 'Admin'){
			return view('admin.index');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}
	}

	public function indexSiswa(){
		if (Auth::user()->status == 'Admin'){
			$selection = User::whereIn('status', ['Siswa'])
			->get();
			return view('admin.index-siswa', ['user' => $selection]);
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}
	}

	public function addSiswa(Request $data){
		if (Auth::user()->status == 'Admin'){
			User::create([
				'nama' => $data->nama,
				'no_induk' => $data->no_induk,
				'password' => Hash::make($data->password),
				'status' => $data->status,
				'kelas' => $data->kelas,
			]);
			return back()->with('success', 'User Telah Ditambah');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}	
	}

	public function editSiswa(Request $request){
		if (Auth::user()->status == 'Admin'){
			User::where('no_induk', $request->no_induk)
			->update([
				'nama' => $request->nama,
				'no_induk' => $request->no_induk,
				'kelas' => $request->kelas,
			]);
			return back()->with('success', 'Data User Telah Diedit');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}	
	}

	public function deleteSiswa($no_induk){
		if (Auth::user()->status == 'Admin'){
			User::where('no_induk', $no_induk)->delete();
			return back()->with('success', 'User Telah Dihapus');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}
	}


	public function indexGuru(){
		if (Auth::user()->status == 'Admin'){
			$selection = User::whereIn('status', ['Guru'])
			->get();
			return view('admin.index-guru', ['user' => $selection]);
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}
	}

	public function addGuru(Request $data){
		if (Auth::user()->status == 'Admin'){
			User::create([
				'nama' => $data->nama,
				'no_induk' => $data->no_induk,
				'password' => Hash::make($data->password),
				'status' => $data->status,
				'kelas' => $data->kelas
			]);
			return back()->with('success', 'User Telah Ditambah');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}	
	}

	public function editGuru(Request $request){
		if (Auth::user()->status == 'Admin'){
			User::where('no_induk', $request->no_induk)
			->update([
				'nama' => $request->nama,
				'no_induk' => $request->no_induk,
				'kelas' => $request->kelas,
			]);
			return back()->with('success', 'Data User Telah Diedit');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}	
	}

	public function deleteGuru($no_induk){
		if (Auth::user()->status == 'Admin'){
			User::where('no_induk', $no_induk)->delete();
			return back()->with('success', 'User Telah Dihapus');
		} else {
			return back()->with('error', 'Anda Tidak Memiliki Akses Ini');
		}
	}
}
