<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $tabel = 'tasks';
    // public $primaryKey = 'id';
    //protected $timestamps = false;
    protected $fillable  =   ['title', 'description', 'priority'];
}
