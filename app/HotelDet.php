<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelDet extends Model
{
    public function location()
	{
    	return $this->belongsTo(Location::class);
	}
	public function hotel()
	{
    	return $this->belongsTo(Hotel::class,'hotel_id');
	}
}
