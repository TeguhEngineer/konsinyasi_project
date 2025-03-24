<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $guarded = ['id'];

    public function konsinyasi()
    {
        return $this->hasMany(Konsinyasi::class, 'distributor_id');
    }
}
