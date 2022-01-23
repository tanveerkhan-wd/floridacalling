<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = ['airline_name','ext','airline_code','misc','short_code','airline_icon'];
}
