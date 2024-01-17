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
                'date' => '2024-02-17 11:48:23',
                'price' => 37.49,
                'train_id' => 1,
                'ticket_type_id' => 1
            ],
            [
                'date' => '2024-01-11 10:25:56',
                'price' => 23.99,
                'train_id' => 2,
                'ticket_type_id' => 2
            ],
            [
                'date' => '2024-01-17 10:46:15',
                'price' => 60.00,
                'train_id' => 3,
                'ticket_type_id' => 3
            ]
        ]);
    }
}
