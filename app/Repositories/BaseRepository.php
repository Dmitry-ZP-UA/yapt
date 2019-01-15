<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     */
    public function create(array $attributes)
    {
        //dd($attributes);
        $this->model->fill($attributes)->save();
    }

    /**
     * @param array $attributes
     * @return bool
     */
    public function update($id, $attributes): bool
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    /**
     * @param int $key
     * @return bool
     */
    public function delete(int $key): bool
    {
        return $this->model->where('id', $key)->delete();
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'desc'): Collection
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): Collection
    {
        return $this->model->find($id);
    }

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public function findBy($key, $value = null): Collection
    {
        return $this->model->where($key, '=', $value)->get();
    }

}