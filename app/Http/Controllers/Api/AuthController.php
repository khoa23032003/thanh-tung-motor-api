<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->authService->register($request->validated());

        return response()->json([
            'message' => __('auth.register_success'),
            'data'    => $user,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login($request->validated());

        return response()->json([
            'success' => true,
            'message' => __('auth.login_success'),
            'data'    => [
                'token'      => $result['token'],
                'token_type' => 'Bearer',
                'user'       => $result['user'],
            ],
        ]);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json([
            'success' => true,
            'message' => __('auth.logout_success'),
        ]);
    }

    public function me(): JsonResponse
    {
        $user = $this->authService->me();

        return response()->json([
            'success' => true,
            'data'    => $user,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = $this->authService->updateProfile($request->validated());

        return response()->json([
            'success' => true,
            'message' => __('auth.profile_updated'),
            'data'    => $user,
        ]);
    }
}
