<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        if($this->isMethod('POST')){
            return [
                'phone' => 'required|string|max:11|min:11|unique:users,phone',
                'username' => 'required|string|max:255||unique:users,username',
                'status' => 'required|string',
                'roles' => 'nullable|array',
            ];
        }else{
            return [
                'phone' => 'required|string|max:11|min:11|unique:users,phone,' . $this->admin->id,
                'username' => 'required|string|max:255||unique:users,username,' . $this->admin->id,
                'status' => 'required|string',
                'roles' => 'nullable|array',
            ];    
        }
    }
}
