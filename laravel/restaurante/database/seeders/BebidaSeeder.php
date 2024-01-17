<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BebidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platos')->insert([
            [
                'nombre' => 'Coca-Cola',
                'precio' => 1.95,
                'tipo' => 'Refresco'
            ],
            [
                'nombre' => 'Fanta Naranja',
                'precio' => 1.95,
                'tipo' => 'Refresco'
            ],
            [
                'nombre' => 'Cerbeza Alhambra',
                'precio' => 2.5,
                'tipo' => 'Alcohol'
            ]
        ]);
    }
}
