<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    public function cars()
    {
        return $this->hasMany(Car::class, 'owner_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
