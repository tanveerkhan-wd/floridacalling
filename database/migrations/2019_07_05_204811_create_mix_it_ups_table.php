<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixItUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_it_ups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fh_id');
            $table->integer('sh_id');
            $table->integer('fhd_id');
            $table->integer('shd_id');
            $table->integer('location_id');
            $table->integer('sublocation_id')->nullable();
            $table->integer('s_location_id');
            $table->integer('s_sublocation_id')->nullable();
            $table->string('name');
            $table->integer('save');
            $table->integer('price');
            $table->integer('fh_night');
            $table->integer('sh_night');
            $table->string('desc_title')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('mix_it_ups');
    }
}
