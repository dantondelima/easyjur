<?php

namespace App\Services;

use App\Services\Interfaces\UsuarioServiceInterface;
use Illuminate\Support\Facades\Auth;

class UsuarioService extends AbstractService implements UsuarioServiceInterface
{
    public function logar(array $data):bool
    {
        if(Auth::guard('usuario')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return true;
        }

        return false;
    }

    public function create(array $data): bool
    {
        $resultado = $this->repository->create($data);
        if ($resultado && Auth::guard('usuario')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return true;
        }

        return false;
    }
}
