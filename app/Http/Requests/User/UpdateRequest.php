<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
            'f_name' => 'string|required|max:50',
            'l_name' => 'string|required|max:50',
            'm_name' => 'string|nullable|max:50',
            'birthday' => 'date|nullable',
            'password' => 'string|min:4',
            'email' => 'string|email|required',
            'image' => 'file|max:2048|nullable',
        ];
    }
}
