<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UsuarioServiceInterface extends ServiceInterface
{
    public function logar(array $data): bool;
    public function create(array $data): bool;
}
