<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password'      => 'required|string',
            'new_password'          => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required'  => __('auth.change_password.current_password_required'),
            'new_password.required'      => __('auth.change_password.new_password_required'),
            'new_password.min'           => __('auth.change_password.new_password_min'),
            'new_password.confirmed'     => __('auth.change_password.new_password_confirmed'),
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
