<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penugasan;
use App\Tugas;
use Carbon\Carbon;
use Auth;
use DB;

class CobaController extends Controller
{
	public function index(){
		$time = Carbon::now();

		$terakhir = DB::table('penugasans')
		->orderBy('id', 'desc')
		->where('id', 1)
		->whereTime('pengumpulan_terakhir', '<=', $time)		
		->first();

		if ($terakhir == null) {
   			return view('welcome');
		} else { 
			Tugas::insert([
				'id_penugasan' => 1,
				'diupload_oleh' => Auth::user()->no_induk,
				'upload' => 'Http',
			]);
			return view('welcome');
		}
	}    
}
