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
            'img' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string'
        ];
    }
}
