<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'customer_group_id' => 'required',
            'email' => 'required|email|unique:crm_users,email',
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            // 'role_id' => 'required',
            'password' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zip_code' => 'required',
            'vat_number' => 'required',
            'status' => 'required',
            'billing_country_id' => 'required',
            'billing_state_id' => 'required',
            'billing_city_id' => 'required',
            'billing_zip_code' => 'required',
            'description' => 'string'
        ];

        return $rules;
    }
}
