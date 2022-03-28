<?php

namespace App\Services;

use App\Services\Interfaces\DicaServiceInterface;
use Illuminate\Support\Collection;

class DicaService extends AbstractService implements DicaServiceInterface
{
    public function allFilter(string|null $search = '', array $searchFields, int|null $tipo, int $limit, int|null $usuario): mixed
    {
        return $this->repository->allFilter($search, $searchFields, $tipo, $limit, $usuario);
    }
}
