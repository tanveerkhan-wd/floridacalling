<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('phone_number');
            $table->tinyInteger('enquiry_type')->comment('1:enquiry,2:quote');
            $table->text('message')->nullable();

            $table->integer('holiday_type')->nullable();
            $table->integer('location_id')->nullable();
            
            $table->integer('accommodation_type')->nullable();
            $table->integer('stay_time')->nullable();
            $table->integer('vehicle_type')->nullable();
            $table->integer('cruse_destination')->nullable();
            
            $table->dateTime('departure_date')->nullable();
            $table->string('flying_from')->nullable();
            
            $table->integer('number_stops')->nullable();
            $table->string('preferred_cruise')->nullable();
            $table->string('cabin_type')->nullable();
            $table->string('flexible_date')->nullable();

            $table->tinyInteger('adults')->nullable();
            $table->tinyInteger('children')->nullable();
            $table->tinyInteger('infants')->nullable();

            $table->integer('transport_req')->nullable();

            $table->string('ref')->nullable();
            $table->string('ref_name')->nullable();
            
            $table->tinyInteger('viewed')->default(0)->comment('1:viewed,0:NotViewed');
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
        Schema::dropIfExists('quotes');
    }
}
