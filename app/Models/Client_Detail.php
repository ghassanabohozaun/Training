<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client_Detail extends Model
{
    protected $table   = 'client__details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_id',
        'mobile',
        'address',
        'email',
    ];
    protected $hidden = [];



    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
