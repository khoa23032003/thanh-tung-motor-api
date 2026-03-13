<?php

namespace App\Swagger\Auth;

/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Login",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"login", "password"},
 *             @OA\Property(property="login", type="string", example="johndoe or john@example.com"),
 *             @OA\Property(property="password", type="string", example="Password@123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Login successful"),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="token", type="string", example="1|abc123..."),
 *                 @OA\Property(property="token_type", type="string", example="Bearer"),
 *                 @OA\Property(property="user", type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="username", type="string", example="johndoe"),
 *                     @OA\Property(property="email", type="string", example="john@example.com"),
 *                     @OA\Property(property="full_name", type="string", example="John Doe"),
 *                     @OA\Property(property="phone", type="string", example="0901234567")
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(response=401, description="Invalid credentials"),
 *     @OA\Response(response=422, description="Validation error")
 * )
 */
class LoginApi {}
