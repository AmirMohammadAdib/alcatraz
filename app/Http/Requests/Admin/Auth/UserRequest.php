<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'phone' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'level' => 'required|integer',
            'role' => 'required|string|max:255',
            'status' => 'required|integer',
            'wallet' => 'required|numeric',
            'award_wallet' => 'required|numeric',
            'cart_number' => 'nullable|string|max:255',
            'shabba_number' => 'nullable|string|max:255'
        ];
    }
}
