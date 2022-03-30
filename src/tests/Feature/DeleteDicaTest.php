<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreatesApplication;
use Tests\TestCase;

class DeleteDicaTest extends TestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        $this->setBaseRoute('dicas');
        $this->setBaseModel('\App\Models\Dica');
        $this->setBaseFunctions('Dicas');
    }

    /** @test */
    public function um_usuario_pode_excluir_uma_dica(){
        $this->signIn();
        $this->destroy();
    }

    /** @test */
    public function um_usuario_nao_autenticado_nao_pode_excluir_uma_dica(){
        $this->destroy();
    }
}
