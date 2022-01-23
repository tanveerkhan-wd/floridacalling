<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MixItUp extends Model
{
    public function fhotel()
	{
    	 return $this->belongsTo(Hotel::class, 'fh_id');

	}
	public function shotel()
	{
    	 return $this->belongsTo(Hotel::class, 'sh_id');

	}
	public function fhotelDet()
	{
    	 return $this->belongsTo(HotelDet::class, 'fhd_id');

	}

	public function shotelDet()
	{
    	 return $this->belongsTo(HotelDet::class, 'shd_id');

	}

	
	public function locationId()
	{
    	 return $this->belongsTo(Location::class, 'location_id');

	}
	public function slocationId()
	{
    	 return $this->belongsTo(Location::class, 's_location_id');

	}
	public function sublocationId()
	{
    	 return $this->belongsTo(SubLocation::class, 'sublocation_id');

	}
	public function ssublocationId()
	{
    	 return $this->belongsTo(SubLocation::class, 's_sublocation_id');

	}
}
