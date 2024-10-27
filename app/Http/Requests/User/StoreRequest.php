<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'f_name' => 'string|required|max:50',
            'l_name' => 'string|required|max:50',
            'm_name' => 'string|max:50',
            'password' => 'string|required|min:4',
            'birthday' => 'date',
            'email' => 'string|email|required|unique:users',
            'image' => 'file|max:2048',
        ];
    }
}
