<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiAuthRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8|string',
            'no_hp' => 'nullable|string|min:11',
            'jobs' => 'nullable|string',
            'address' => 'required|string|min:15',
            'profile_pict' => 'nullable|string',
            'is_admin' => 'boolean',
        ];
    }
}
