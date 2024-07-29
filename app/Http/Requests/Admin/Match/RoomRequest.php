<?php

namespace App\Http\Requests\Admin\Match;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
                'link' => 'required|string|max:255',
                'fee' => 'nullable|numeric',
                'award' => 'required|string|max:255',
                'award_type' => 'required|string|max:255',
                'type' => 'nullable|string|max:255',
                'capacity' => 'required|integer',
                'status' => 'required|integer',
                'title' => 'required|min:3|max:255',
                'img' => 'required|image|max:2048|mimes:png,jpg,jpeg,webp',
            ];
        }else{
            return [
                'link' => 'required|string|max:255',
                'fee' => 'nullable|numeric',
                'award' => 'required|string|max:255',
                'award_type' => 'required|string|max:255',
                'type' => 'nullable|string|max:255',
                'capacity' => 'required|integer',
                'status' => 'required|integer',
                'title' => 'required|min:3|max:255',
                'img' => 'nullable|image|max:2048|mimes:png,jpg,jpeg,webp',
            ];
        }
    }
}
