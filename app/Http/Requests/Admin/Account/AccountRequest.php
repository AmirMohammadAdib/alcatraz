<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'img' => 'required|file|max:2048|mimes:png,jpg,jpeg,webp',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ];
    }
}
