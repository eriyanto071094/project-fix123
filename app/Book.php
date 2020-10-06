<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    protected $table = 'tblbook';
    protected $fillable = ['isbn', 'title', 'author', 'total_pages', 'categories'];
}
