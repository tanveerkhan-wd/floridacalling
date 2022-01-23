<?php

use Illuminate\Database\Seeder;
use App\DisneyResort;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 7; $i++) { 
	    	DisneyResort::create([
	            'title' => $faker->name,
	            'image' => $faker->imageUrl,
	            'price' => $faker->randomDigit(4),
	            'description' => $faker->text($maxNbChars = 200),
	        ]);
    	}
    }
}
