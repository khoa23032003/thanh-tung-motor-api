<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id();

        return [
            'email'     => 'nullable|email|max:100|unique:users,email,' . $userId,
            'phone'     => 'nullable|string|max:20|unique:users,phone,' . $userId,
            'full_name' => 'nullable|string|max:100',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'message' => __('common.validation_error'),
                'errors'  => $validator->errors(),
            ], 422)
        );
    }
}
