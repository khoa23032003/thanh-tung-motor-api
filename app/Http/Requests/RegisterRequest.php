<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username'  => 'required|string|max:50|unique:users,username',
            'password'  => 'required|string|min:8',
            'email'     => 'nullable|email|max:100|unique:users,email',
            'phone'     => 'nullable|string|max:20|unique:users,phone',
            'full_name' => 'nullable|string|max:100',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation error',
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
