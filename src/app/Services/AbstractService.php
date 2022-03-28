<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Services\Interfaces\ServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AbstractService implements ServiceInterface
{
    protected $repository;

    /**
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find one register
     *
     * @param int $id
     * @return array
     */
    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * Find one register or fail
     *
     * @param int $id
     * @return array
     */
    public function findOrFail(int $id): Collection
    {
        return $this->repository->findOrFail($id);
    }

    /**
     * Find first register
     *
     * @return array
     */
    public function first(): Collection
    {
        return $this->repository->first();
    }

    /**
     * Get all registers
     *
     * @return array
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }

    /**
     * Get with paginate
     *
     * @param $limit
     * @return array
     */
    public function paginate($limit = 10): Collection
    {
        return $this->repository->paginate($limit);
    }

    /**
     * Create new register
     *
     * @param array $data
     * @return array
     */
    public function create(array $data): bool | Model
    {
        return $this->repository->create($data);
    }

    /**
     * Update one register
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete one register
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

}
