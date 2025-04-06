<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|string',
            'password' => 'required|string|min:6',
            'remember' => 'filled|required'

        ];
    }

    public function authenticate()
    {
        $this->isNoRateLimited();

        if (!Auth::attempt($this->only(['email', 'password']))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }


    public function isNoRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $second = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.failed', [
                'second' => $second,
                'minutes' => ceil($second / 60)
            ])
        ]);
    }
    public function throttleKey()
    {
        Str::transliterate(Str::lower($this->string('email') . '|' . $this->ip()));
    }
}
