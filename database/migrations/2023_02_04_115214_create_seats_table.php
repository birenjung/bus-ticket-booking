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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->boolean('isA1')->default(0);
            $table->boolean('isA2')->default(0);
            $table->boolean('isA3')->default(0);
            $table->boolean('isA4')->default(0);
            $table->boolean('isA5')->default(0);
            
            $table->boolean('isB1')->default(0);
            $table->boolean('isB2')->default(0);
            $table->boolean('isB3')->default(0);
            $table->boolean('isB4')->default(0);
            $table->boolean('isB5')->default(0);
            
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses');       
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('date');
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
        Schema::dropIfExists('seats');
    }
};
