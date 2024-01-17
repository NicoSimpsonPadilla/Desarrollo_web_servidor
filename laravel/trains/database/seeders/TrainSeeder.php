<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trains')->insert([
            [
                'name' => 'Thomas the tank Engine',
                'passengers' => 356,
                'year' => 2022,
                'train_type_id' => 1
            ],
            [
                'name' => 'James the Red Engine',
                'passengers' => 231,
                'year' => 2020,
                'train_type_id' => 2
            ],
            [
                'name' => 'Gordon the Big Engine',
                'passengers' => 547,
                'year' => 2016,
                'train_type_id' => 3
            ]
        ]);
    }
}
