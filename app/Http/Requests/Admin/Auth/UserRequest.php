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
        if($this->isMethod('POST')){
            return [
                'phone' => 'required|string|max:10|min:10|unique:users,phone',
                'username' => 'required|string|max:255||unique:users,username',
                'level' => 'required|integer',
                'role' => 'nullable|string|max:255',
                'status' => 'required|string',
                'wallet' => 'nullable|numeric',
                'award_wallet' => 'nullable|numeric',
                'cart_number' => 'required|string|max:255|max:16|min:16',
                'shabba_number' => 'required|string|max:255|max:24|min:24'
            ];
        }else{
            return [
                'phone' => 'required|string|max:10|min:10|unique:users,phone,' . $this->player->id,
                'username' => 'required|string|max:255||unique:users,username,' . $this->player->id,
                'level' => 'required|integer',
                'role' => 'nullable|string|max:255',
                'status' => 'required|string',
                'wallet' => 'nullable|numeric',
                'award_wallet' => 'nullable|numeric',
                'cart_number' => 'required|string|max:255|max:16|min:16',
                'shabba_number' => 'required|string|max:255|max:24|min:24'
            ];
        }
    }
}
