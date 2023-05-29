<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:employees,email,except,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'street' => 'filled',
            'city' => 'required_with:street',
            'country' => 'required_with:street',
            'postal_code' => 'required_with:street',
        ];
    }
}
