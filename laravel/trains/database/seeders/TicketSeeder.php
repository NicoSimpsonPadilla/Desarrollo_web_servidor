<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'date' => '21/01/2024',
                'price' => 32,
                'train_id' => 1,
                'ticket_type_id' => 1
            ],
            [
                'date' => '11/02/2024',
                'price' => 231,
                'train_id' => 7,
                'ticket_type_id' => 2
            ],
            [
                'date' => '04/02/2024',
                'price' => 60,
                'train_id' => 3,
                'ticket_type_id' => 3
            ]
        ]);
    }
}
