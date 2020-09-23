<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;
    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama_siswa', 'alamat', 'no_hp'];
}
