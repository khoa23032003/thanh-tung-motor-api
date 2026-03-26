<?php

namespace App\Swagger\Auth;

/**
 * @OA\Post(
 *     path="/api/auth/change-password",
 *     summary="Change password",
 *     tags={"Auth"},
 *     security={{"sanctum": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"current_password", "new_password", "new_password_confirmation"},
 *             @OA\Property(property="current_password",          type="string", example="old_password123"),
 *             @OA\Property(property="new_password",              type="string", example="new_password456"),
 *             @OA\Property(property="new_password_confirmation", type="string", example="new_password456")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Password changed successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string",  example="Password changed successfully.")
 *         )
 *     ),
 *     @OA\Response(response=400, description="Current password is incorrect"),
 *     @OA\Response(response=401, description="Unauthenticated"),
 *     @OA\Response(response=422, description="Validation error")
 * )
 */
class ChangePasswordApi {}
