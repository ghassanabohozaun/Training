<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    //protected $primaryKey  = 'id';
    //protected $timestamps = true;
    protected $fillable = ['title', 'summary', 'description', 'views'];
}
