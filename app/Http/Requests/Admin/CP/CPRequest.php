<?php

namespace App\Http\Requests\Admin\CP;

use Illuminate\Foundation\Http\FormRequest;

class CPRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'img' => 'required|string|max:255',
            'cover' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'super_price' => 'required|numeric',
            'status' => 'required|integer'
        ];
    }
}
