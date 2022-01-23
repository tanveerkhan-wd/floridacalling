<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id');
            $table->integer('total_review');
            $table->integer('excellent');
            $table->integer('very_good');
            $table->integer('average');
            $table->integer('poor');
            $table->integer('terrible');
            $table->string('sleep_quality');
            $table->string('location');
            $table->string('rooms');
            $table->string('service');
            $table->string('value');
            $table->string('cleanliness');
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
        Schema::dropIfExists('rating_masters');
    }
}
