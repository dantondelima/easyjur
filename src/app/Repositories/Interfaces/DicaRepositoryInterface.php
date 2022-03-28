<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface DicaRepositoryInterface extends RepositoryInterface
{
    public function allFilter(string $search, array $searchFields, int $tipo, int $limit, int $usuario): mixed;
}
