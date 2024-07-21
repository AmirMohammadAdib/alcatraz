<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|string|max:255',
            'periority' => 'required|integer',
            'seen' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
            'admin_id' => 'nullable|exists:admins,id',
            'ticket_id' => 'nullable|exists:tickets,id'
        ];
    }
}
