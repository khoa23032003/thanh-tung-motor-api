<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->newQuery()->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model->newQuery()->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->find($id);

        if (! $model) {
            return null;
        }

        $model->fill($attributes);
        $model->save();

        return $model;
    }

    public function delete($id): bool
    {
        $model = $this->find($id);

        if (! $model) {
            return false;
        }

        return (bool) $model->delete();
    }
}
