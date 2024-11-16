<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($filters,$perPage,$relations = null)
    {
        $query  = $this->model->query();
                            
        if($relations) $query->with($relations);

        $query->filter($filters);

        if (method_exists($this->model, 'scopeSort')) {
            $query->sort();
        }else{
            $query->latest();
        }

        return $query->paginate($perPage ?: 10);
    }

    public function getById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
