<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'mobile',
        'birthday',
        'bio'
    ];
    protected $hidden = [];
    //protected $timestamps = [];
}
