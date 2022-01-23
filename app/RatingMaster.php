<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingMaster extends Model
{
    
	public function fsleep_quality()
	{
    	return $this->belongsTo(RatingImages::class,'sleep_quality');
	}
	public function flocation()
	{
    	return $this->belongsTo(RatingImages::class,'location');
	}
	public function frooms()
	{
    	return $this->belongsTo(RatingImages::class,'rooms');
	}
	public function fservice()
	{
    	return $this->belongsTo(RatingImages::class,'service');
	}
	public function fvalue()
	{
    	return $this->belongsTo(RatingImages::class,'value');
	}
	public function fcleanliness()
	{
    	return $this->belongsTo(RatingImages::class,'cleanliness');
	}
}
