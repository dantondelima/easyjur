<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface DicaServiceInterface extends ServiceInterface
{
    public function allFilter(string $search, array $searchFields, int $tipo, int $limit, int $usuario): mixed;
}
