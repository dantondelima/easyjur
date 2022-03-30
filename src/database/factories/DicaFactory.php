<?php

namespace Database\Factories;

use App\Models\Dica;
use App\Models\Usuario;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DicaFactory extends Factory
{
    protected $model = Dica::class;

    public function definition()
    {
        return [
            'nome' => $this->limpaPonto($this->faker->text(15)),
            'marca' => $this->limpaPonto($this->faker->text(15)),
            'modelo' => $this->limpaPonto($this->faker->text(10)),
            'versao' => $this->limpaPonto($this->faker->optional(0.5, null)->text(15)),
            'descricao' => $this->limpaPonto($this->faker->text()),
            'veiculo_id' => Veiculo::count() == 0? Veiculo::factory()->create()->id : rand(1,3),
            'usuario_id' => Usuario::count() == 0? Usuario::factory()->create()->id : $this->faker->optional(0.3, 1)->numberBetween(1, Usuario::count()),
        ];
    }

    public function limpaPonto(string|null $text){
        if($text == null)
            return null;
        return str_replace('.', '', $text);
    }
}
