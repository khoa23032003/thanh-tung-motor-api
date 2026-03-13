<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findActiveByUsername(string $username): ?User
    {
        return $this->model->notDeleted()
            ->where('username', $username)
            ->where('is_active', true)
            ->first();
    }

    public function findActiveByLogin(string $login): ?User
    {
        return $this->model->notDeleted()
            ->where(function ($query) use ($login) {
                $query->where('username', $login)
                      ->orWhere('email', $login);
            })
            ->where('is_active', true)
            ->first();
    }
}
