<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository
{
    protected Model $model;

    public function __construct(string $modelClass)
    {
        $this->model = new $modelClass();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function delete(Model $model): ?bool
    {
        return $model->delete();
    }

    public function paginate(int $number): LengthAwarePaginator
    {
        return $this->model->paginate($number);
    }
}
