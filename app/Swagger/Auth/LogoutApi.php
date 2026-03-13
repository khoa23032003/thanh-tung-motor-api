<?php

namespace App\Swagger\Auth;

/**
 * @OA\Post(
 *     path="/api/auth/logout",
 *     summary="Logout",
 *     tags={"Auth"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Logout successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Logout successful")
 *         )
 *     ),
 *     @OA\Response(response=401, description="Unauthenticated")
 * )
 */
class LogoutApi {}
