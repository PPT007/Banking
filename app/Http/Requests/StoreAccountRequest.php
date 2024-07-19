<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Update this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'accounts.*.first_name' => 'required|string|max:255',
            'accounts.*.last_name' => 'required|string|max:255',
            'accounts.*.dob' => 'required|date',
            'accounts.*.address' => 'required|string',
        ];
    }
}
