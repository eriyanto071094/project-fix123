<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SiswaController extends Controller
{
    public function index()
    {
    	// mengambil data dari table siswa
    	$siswa = DB::table('siswa')->get();
 
    	// mengirim data siswa ke view index
    	return view('index',['siswa' => $siswa]);
 
	}
	

    public function hapus($id)
    {
	// menghapus data siswa berdasarkan id yang dipilih
	DB::table('siswa')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman siswa
	return redirect('/siswa');
    }

    public function tambah()
    {
 
	// memanggil view tambah
	return view('tambah');
 
    }
    public function store(Request $request)
    {
	//$create_dt = date("Y-m-d H:i:s A", strtotime($_POST['post_date']." ".$_POST['post_time']));
	// insert data ke table pegawai
	DB::table('siswa')->insert([
		'nis' => $request->nis,
		'nama_siswa' => $request->nama_siswa,
		'alamat' => $request->alamat,
		'no_hp' => $request->no_hp
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/siswa');
 
    }

    public function edit($id)
    {
	// mengambil data siswa berdasarkan id yang dipilih
	$siswa = DB::table('siswa')->where('id',$id)->get();
	// passing data siswa yang didapat ke view edit.blade.php
	return view('edit',['siswa' => $siswa]);
 
    }

    public function update(Request $request)
    {
	// update data pegawai
	DB::table('siswa')->where('id',$request->id)->update([
		'nama_siswa' => $request->nama_siswa,
		'alamat' => $request->alamat,
		'no_hp' => $request->no_hp
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/siswa');
    }

}
