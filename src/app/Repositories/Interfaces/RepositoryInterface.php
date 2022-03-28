<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function find(int $id): Model;

    public function findOrFail(int $id): Collection;

    public function first(): Collection;

    public function all(): Collection;

    public function paginate($limit = 10): Collection;

    public function create(array $data): Model;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
