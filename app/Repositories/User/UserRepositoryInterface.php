<?php

namespace App\Repositories\User;

use App\DTO\UserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Model;

    public function delete(User $user): ?bool;

    public function paginate(int $number): LengthAwarePaginator;

    public function create(UserDTO $dto): User;
}
