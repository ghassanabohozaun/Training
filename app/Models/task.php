<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class task extends Model
{
    protected $tabel = 'tasks';
    // public $primaryKey = 'id';
    //protected $timestamps = false;
    protected $fillable  =   ['title', 'description', 'priority', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
