<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function parent() {
        return $this->belongsTo(static::class, 'parent_category','id');
    }

    public function getHotelCount() {
        return $this->hasMany(Hotel::class, 'location_id','id');
    }
}
