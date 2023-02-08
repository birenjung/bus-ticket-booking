<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
            'bus_name' => 'Agni',
            'bus_type' => 'Normal',
            'image' => 'images/buses/normalbus.png',
            'isWifi' => 0,
            'isACfan' => 0,
            'isMusic' => 1,
            'isComfortSeat' => 1,
            'isFirstAid' => 1,
            'isWater' => 1,
            'isCharger' => 1,
            'isCharger' => 1,
            'isTV' => 1,
            'price' => 1000,
            'route_id' => 2,
            'departure' => '4:30 AM'
        ]);
        
        DB::table('buses')->insert([
            'bus_name' => 'Sakira',
            'bus_type' => 'Delux',
            'image' => 'images/buses/deluxbus.jpg',
            'isWifi' => 1,
            'isACfan' => 1,
            'isMusic' => 1,
            'isComfortSeat' => 1,
            'isFirstAid' => 1,
            'isWater' => 1,
            'isCharger' => 1,
            'isCharger' => 1,
            'isTV' => 1,
            'price' => 2000,
            'route_id' => 1,
            'departure' => "4:30 AM",
        ]);               
        
    }
}
