<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'first_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'email' => [
                'string',
                'lowercase',
                'email',
                Rule::unique('users', 'email')->ignore($this->user()->id)
            ]
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.regex' => 'İsim yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'last_name.regex' => 'Soyisim yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'email.unique' => 'Bu e-posta adresi zaten kullanımda.',
        ];
    }
}
