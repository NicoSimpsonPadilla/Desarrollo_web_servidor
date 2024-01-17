<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TipoPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_plato')->insert([
            [
                'tipo' => 'Racion'
            ],
            [
                'tipo' => 'Media Racion'
            ],
            [
                'tipo' => 'Tapa'
            ]
        ]);
    }
}
