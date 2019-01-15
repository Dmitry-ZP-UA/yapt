<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @param $attributes
     * @return bool
     */
    public function update($id, $attributes): bool;

    /**
     * @param int $key
     * @return mixed
     */
    public function delete(int $key);

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return Collection
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc'): Collection;

    /**
     * @param $id
     * @return Collection
     */
    public function find($id): Collection;

    /**
     * @param $key
     * @param null $value
     * @return Collection
     */
    public function findBy($key, $value = null): Collection;
}