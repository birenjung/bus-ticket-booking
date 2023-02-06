<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_name');
            $table->string('bus_type');
            $table->string('image');
            $table->float('price');
            $table->boolean('isWifi')->default(0);
            $table->boolean('isACfan')->default(0);
            $table->boolean('isMusic')->default(0);
            $table->boolean('isComfortSeat')->default(0);
            $table->boolean('isFirstAid')->default(0);
            $table->boolean('isWater')->default(0);
            $table->boolean('isCharger')->default(0);
            $table->boolean('isTV')->default(0); 
            $table->unsignedBigInteger('route_id');
            $table->string('departure');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');           
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
        Schema::dropIfExists('buses');
    }
};
