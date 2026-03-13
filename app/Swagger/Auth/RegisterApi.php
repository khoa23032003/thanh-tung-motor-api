<?php

namespace App\Swagger\Auth;

/**
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Register a new user",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"username","password"},
 *             @OA\Property(property="username", type="string", example="johndoe"),
 *             @OA\Property(property="password", type="string", example="Password@123"),
 *             @OA\Property(property="email", type="string", example="john@example.com"),
 *             @OA\Property(property="phone", type="string", example="0901234567"),
 *             @OA\Property(property="full_name", type="string", example="John Doe"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="User registered successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User registered successfully"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="username", type="string", example="johndoe"),
 *                 @OA\Property(property="email", type="string", example="john@example.com"),
 *                 @OA\Property(property="phone", type="string", example="0901234567"),
 *                 @OA\Property(property="full_name", type="string", example="John Doe"),
 *             )
 *         )
 *     ),
 *     @OA\Response(response=422, description="Validation error")
 * )
 */
class RegisterApi {}
