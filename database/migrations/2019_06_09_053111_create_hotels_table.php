<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('location_id');
            $table->integer('disney_resort_id')->default(0)->nullable();
            $table->string('slug',250)->nullable();
            $table->string('name');
            $table->text('image');
            $table->integer('price');
            $table->string('days',200);
            $table->integer('saving')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('hotel_rating')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1:Hotels,2:Villas,3:Disney,4:Universal');
            $table->tinyInteger('hot_deal')->default(0)->comment('0:Deactive,1:Active');
            $table->tinyInteger('fav')->default(0)->comment('0:not,1:yes');
            $table->tinyInteger('status')->default(1)->comment('1:Active,0:Deactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
