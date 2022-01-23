<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
	protected $fillable = ['airport_name','city_name','country_name','country_code','airport_code','latitude','longitude','gmt','timezone'];	
}
