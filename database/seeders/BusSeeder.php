<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'price' => 2000,
            'route_id' => 1,
        ]);
    }
}
