<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreatesApplication;
use Tests\TestCase;

class UpdateDicaTest extends TestCase
{
    use CreatesApplication;
    use WithFaker;

    private $attributes = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->setBaseRoute('dicas');
        $this->setBaseModel('\App\Models\Dica');
        $this->setBaseFunctions('Dicas');

        $this->attributes = [
            'nome' => limpaPonto($this->faker->text(15)),
            'marca' => limpaPonto($this->faker->text(15)),
            'modelo' => limpaPonto($this->faker->text(10)),
        ];
    }

    /** @test */
    public function um_usuario_pode_atualizar_uma_dica(){
        $this->signIn();
        $this->update($this->attributes);
    }

    /** @test */
    public function um_usuario_nao_autenticado_nao_pode_atualizar_uma_dica(){
        $this->update($this->attributes);
    }

}
