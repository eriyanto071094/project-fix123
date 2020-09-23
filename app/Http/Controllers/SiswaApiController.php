<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaApiController extends Controller
{
    function create(Request $request)
    {
        $siswa = new Siswa();

        $siswa->nis = $request->input('nis');
        $siswa->nama_siswa = $request->input('nama_siswa');
        $siswa->alamat = $request->input('alamat');
        $siswa->no_hp = $request->input('no_hp');

        $siswa->save();
        return response()->json($siswa);
    }

    function view(Request $request)
    {
        $siswa = Siswa::all();
        return response()->json($siswa);
    }

    function update($id, Request $request)
    {
        $siswa = Siswa::where('id', $id)->first();
        if($siswa){
            $siswa->nis = $request->nis ? $request->nis : $siswa->nis;
            $siswa->nama_siswa = $request->nama_siswa ? $request->nama_siswa : $siswa->nama_siswa;
            $siswa->alamat = $request->alamat ? $request->alamat : $siswa->alamat;
            $siswa->no_hp = $request->no_hp ? $request->no_hp : $siswa->no_hp;
            
            $siswa->save();
            return response()->json(
                [
                    "message" => "no id berhasil diupdate " . $id,
                    "data" => $siswa
                ]
             );
        };
    }

    function delete($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        if($siswa){
            $siswa->delete();
            return response()->json(
                [
                    "message" => "no id berhasil didelete" . $id
                ]
             );
        };
    }

}
