<?php

namespace Database\Factories;

use App\Models\Dica;
use Illuminate\Database\Eloquent\Factories\Factory;

class DicaFactory extends Factory
{
    protected $model = Dica::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->text(20),
            'marca' => $this->faker->text(15),
            'modelo' => $this->faker->text(10),
            'versao' => $this->faker->optional(0.5, null)->text(15),
            'descricao' => $this->faker->text(),
            'veiculo_id' => rand(1,3),
            'usuario_id' => $this->faker->optional(0.3, 1)->randomDigitNotNull,
        ];
    }
}
