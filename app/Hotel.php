<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function location()
	{
    	return $this->belongsTo(Location::class)->with('getHotelCount');
	}
	public function disneyResort()
	{
    	 return $this->belongsTo(DisneyResort::class, 'disney_resort_id');

	}
	public function hotel_det()
	{
    	return $this->belongsTo(HotelDet::class,'id','hotel_id');
	}
	public function ratingMaster()
	{
    	return $this->belongsTo(RatingMaster::class,'id','hotel_id')->with('fsleep_quality','flocation','frooms','fservice','fvalue','fcleanliness');
	}
	public function ta_rating()
	{
    	return $this->belongsTo(RatingImages::class,'rating');
	}
}
