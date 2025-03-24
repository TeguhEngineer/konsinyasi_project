<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsinyasi extends Model
{
    protected $guarded = ['id'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
