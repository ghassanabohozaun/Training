<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $primaryKe = 'id';
    protected $fillable = [
        'user_id',
        'address',
        'mobile',
        'phone',
        'birthday',
        'bio'
    ];
    //protected $hidden = ['updated_at'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
