<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seats')->insert([
            'seat_number' => 'A1',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A2',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A3',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A4',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A5',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A6',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A7',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A8',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A9',
            'bus_id' => 1,           
        ]);
        DB::table('seats')->insert([
            'seat_number' => 'A10',
            'bus_id' => 1,           
        ]);
    }
}
