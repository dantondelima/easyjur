<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ServiceInterface
{
    public function find(int $id): Model;

    public function all(): Collection;

    public function create(array $data): bool|Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
