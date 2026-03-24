<?php

namespace App\Swagger\Auth;

/**
 * @OA\Put(
 *     path="/api/auth/profile",
 *     summary="Update profile",
 *     tags={"Auth"},
 *     security={{"sanctum": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="email",     type="string", example="john@example.com"),
 *             @OA\Property(property="phone",     type="string", example="0901234567"),
 *             @OA\Property(property="full_name", type="string", example="John Doe")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Profile updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string",  example="Profile updated successfully."),
 *             @OA\Property(property="data",    type="object",
 *                 @OA\Property(property="id",        type="integer", example=1),
 *                 @OA\Property(property="username",  type="string",  example="johndoe"),
 *                 @OA\Property(property="email",     type="string",  example="john@example.com"),
 *                 @OA\Property(property="full_name", type="string",  example="John Doe"),
 *                 @OA\Property(property="phone",     type="string",  example="0901234567")
 *             )
 *         )
 *     ),
 *     @OA\Response(response=401, description="Unauthenticated"),
 *     @OA\Response(response=422, description="Validation error")
 * )
 */
class UpdateProfileApi {}
