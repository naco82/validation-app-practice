<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}