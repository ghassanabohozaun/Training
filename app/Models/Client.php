<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    protected $table  = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'age',
        'class',
    ];

    protected $hidden = [];

    public function clientDetail(): HasOne
    {
        return $this->hasOne(Client_Detail::class);
    }
}
