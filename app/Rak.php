<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    public $timestamps = false;
    protected $table = 'tblrak';
    protected $fillable = ['nama_rak'];
}
