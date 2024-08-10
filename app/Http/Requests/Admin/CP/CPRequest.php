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
        if($this->isMethod('POST')){
            return [
                'title' => 'required|string|max:255',
                'amount' => 'required|numeric',
                'img' => 'required|file|max:2048|mimes:png,jpg,jpeg,gif,webp',
                'cover' => 'required|file|max:2048|mimes:png,jpg,jpeg,gif,webp',
                'price' => 'required|numeric',
                'super_price' => 'required|numeric',
                'status' => 'required|integer',
                'super_status_sale' => 'required|in:0,1'
            ];
        }else{
            return [
                'title' => 'required|string|max:255',
                'amount' => 'required|numeric',
                'img' => 'nullable|file|max:2048|mimes:png,jpg,jpeg,gif,webp',
                'cover' => 'nullable|file|max:2048|mimes:png,jpg,jpeg,gif,webp',
                'price' => 'required|numeric',
                'super_price' => 'required|numeric',
                'status' => 'required|integer',
                'super_status_sale' => 'required|in:0,1'

            ];
        }
    }
}
