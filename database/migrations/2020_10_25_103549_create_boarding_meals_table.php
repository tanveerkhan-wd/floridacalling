<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardingMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meal_code',10);
            $table->string('meal_name');
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
        Schema::dropIfExists('boarding_meals');
    }
}
