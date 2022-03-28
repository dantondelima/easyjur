<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'easyjur',
            'email' => 'usuario@easyjur.com',
            'password' => Hash::make('easyjur'),
        ]);
        Usuario::factory()->times(8)->create();
    }
}
