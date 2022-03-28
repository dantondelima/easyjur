<?php

namespace Database\Seeders;

use App\Models\Dica;
use Illuminate\Database\Seeder;

class DicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dica::factory()->times(15)->create();
    }
}
