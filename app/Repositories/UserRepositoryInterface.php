<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findActiveByUsername(string $username): ?User;
    
    public function findActiveByLogin(string $login): ?User; 
}