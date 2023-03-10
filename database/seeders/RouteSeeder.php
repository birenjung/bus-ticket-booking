<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            'route_name' => 'Itahari to Kathmandu',
        ]);
        DB::table('routes')->insert([
            'route_name' => 'Itahari to Chitwan',
        ]);        
    }
}
