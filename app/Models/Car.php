<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function owner()
    {
        return $this->belongsTo(Owners::class, 'owner_id');
    }

    public function photos()
    {
        return $this->hasMany(CarPhoto::class);
    }

    protected $fillable = ['brand', 'model', 'reg_number', 'owner_id'];
}
