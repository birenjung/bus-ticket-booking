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
        Schema::create('post_your_rides', function (Blueprint $table) {
            $table->id();
            $table->string('operator_name');
            $table->string('phone_number');
            $table->string('bus_type');
            $table->string('leaving_from');
            $table->string('going_destination');
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
        Schema::dropIfExists('post_your_rides');
    }
};
