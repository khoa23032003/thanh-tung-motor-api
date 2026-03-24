<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {}

    public function register(array $data): User
    {
        $user = $this->userRepository->create([
            'username'   => $data['username'],
            'password'   => $data['password'],
            'email'      => $data['email'] ?? null,
            'phone'      => $data['phone'] ?? null,
            'full_name'  => $data['full_name'] ?? null,
            'created_by' => $data['username'],
            'updated_by' => $data['username'],
        ]);

        return $user;
    }

    public function login(array $data): array
    {
        $user = $this->userRepository->findActiveByLogin($data['login']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new Exception('Invalid credentials', 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
            'user'  => $user,
        ];
    }

    public function logout(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }

    public function me(): User
    {
        return auth()->user();
    }

    public function updateProfile(array $data): User
    {
        $user = auth()->user();

        $updateData = ['updated_by' => $user->username];

        if (isset($data['email']))     $updateData['email']     = $data['email'];
        if (isset($data['phone']))     $updateData['phone']     = $data['phone'];
        if (isset($data['full_name'])) $updateData['full_name'] = $data['full_name'];

        return $this->userRepository->update($user->id, $updateData);
    }
}
