<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeDisneyDiningContent extends Model
{
    public function disneyResort()
	{
    	 return $this->belongsTo(DisneyResort::class, 'url');

	}
}
