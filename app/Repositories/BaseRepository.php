<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected readonly Model $model)
    {
    }

    public function all(): Collection
    {
        return $this->model
            ->newQuery()
            ->latest()
            ->get();
    }

    public function find(int $id): ?Model
    {
        return $this->model
            ->newQuery()
            ->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model
            ->newQuery()
            ->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $record = $this->find($id);

        if (!$record) {
            return false;
        }

        return $record->update($data);
    }

    public function delete(int $id): bool
    {
        $record = $this->find($id);

        if (!$record) {
            return false;
        }

        return $record->delete();
    }
}