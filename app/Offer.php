<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function hotel()
	{
    	return $this->belongsTo(Hotel::class,'hotel_id');
	}
}
