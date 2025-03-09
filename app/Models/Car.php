<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function owner()
    {
        return $this->belongsTo(Owners::class, 'owner_id');
    }
}
