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
        Schema::create('buy_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone_number');
            $table->string('boarding_place');
            $table->float('qty');
            $table->float('total');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');           
            $table->string('date');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->string('payment_method');
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
        Schema::dropIfExists('buy_tickets');
    }
};
