<?php

namespace App\Swagger\Auth;

/**
 * @OA\Get(
 *     path="/api/auth/me",
 *     summary="Get current user",
 *     tags={"Auth"},
 *     security={{"sanctum": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Get current user successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="username", type="string", example="johndoe"),
 *                 @OA\Property(property="email", type="string", example="john@example.com"),
 *                 @OA\Property(property="full_name", type="string", example="John Doe"),
 *                 @OA\Property(property="phone", type="string", example="0901234567"),
 *                 @OA\Property(property="is_active", type="boolean", example=true)
 *             )
 *         )
 *     ),
 *     @OA\Response(response=401, description="Unauthenticated")
 * )
 */
class MeApi {}
