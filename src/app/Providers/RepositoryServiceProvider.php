<?php

namespace App\Providers;

use App\Models\Dica;
use App\Models\Usuario;
use App\Models\Veiculo;
use App\Repositories\DicaRepository;
use App\Repositories\Interfaces\DicaRepositoryInterface;
use App\Repositories\Interfaces\UsuarioRepositoryInterface;
use App\Repositories\Interfaces\VeiculoRepositoryInterface;
use App\Repositories\UsuarioRepository;
use App\Repositories\VeiculoRepository;
use App\Services\DicaService;
use App\Services\Interfaces\DicaServiceInterface;
use App\Services\Interfaces\UsuarioServiceInterface;
use App\Services\Interfaces\VeiculoServiceInterface;
use App\Services\UsuarioService;
use App\Services\VeiculoService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Usuário
        $this->app->bind(UsuarioServiceInterface::class, function ($app) {
            return new UsuarioService($app->make(UsuarioRepositoryInterface::class));
        });
        $this->app->bind(UsuarioRepositoryInterface::class, function ($app) {
            return new UsuarioRepository(new Usuario());
        });

        //Dica
        $this->app->bind(DicaServiceInterface::class, function ($app) {
            return new DicaService($app->make(DicaRepositoryInterface::class));
        });
        $this->app->bind(DicaRepositoryInterface::class, function ($app) {
            return new DicaRepository(new Dica());
        });

        //Veículo
        $this->app->bind(VeiculoServiceInterface::class, function ($app) {
            return new VeiculoService($app->make(VeiculoRepositoryInterface::class));
        });
        $this->app->bind(VeiculoRepositoryInterface::class, function ($app) {
            return new VeiculoRepository(new Veiculo());
        });
    }
}
