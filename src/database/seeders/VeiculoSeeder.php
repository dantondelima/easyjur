<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculos')->insert([
            ['nome' => 'Moto'],
            ['nome' => 'Carro'],
            ['nome' => 'Caminhão']
        ]);
    }
}
