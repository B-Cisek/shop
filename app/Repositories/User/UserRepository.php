<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * @method all()
 * @method find(int $id)
 * @method delete(User $user)
 * @method paginate(int $number)
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function create(UserDTO $dto): User
    {
        return $this->model->create([
            'email' => $dto->email,
            'password' => $dto->password,
            'accept_newsletter' => $dto->newsletter
        ]);
    }
}
