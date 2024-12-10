<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'domain_name' => ['nullable', 'string', 'max:255', Rule::unique('crm_organizations', 'domain_name')],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('crm_organizations', 'email')],
            'phone' => ['nullable', 'string', 'max:20'],
            'owner_id' => ['nullable', 'integer', 'exists:users,id'],
            'industry_id' => ['nullable', 'integer', 'exists:industries,id'],
            'stakeholder_type' => ['nullable', 'integer', 'min:1', 'max:3'],
            'number_of_employees' => ['nullable', 'integer', 'min:0'],
            'annual_revenue' => ['nullable', 'integer', 'min:0'],
            'time_zone' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'primary_address_id' => ['nullable', 'integer', 'exists:addresses,id'],
            'billing_address_id' => ['nullable', 'integer', 'exists:addresses,id'],
            'shipping_address_id' => ['nullable', 'integer', 'exists:addresses,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_domain_name.required' => 'The company domain name is required.',
            'company_domain_name.unique' => 'The company domain name has already been taken.',
            'company_name.required' => 'The company name is required.',
            'company_owner.string' => 'The company owner must be a string.',
            'type.string' => 'The type must be a string.',
            'city.string' => 'The city must be a string.',
            'state.string' => 'The state must be a string.',
            'postal_code.string' => 'The postal code must be a string.',
            'number_of_employees.integer' => 'The number of employees must be an integer.',
            'annual_revenue.integer' => 'The annual revenue must be an integer.',
            'time_zone.string' => 'The time zone must be a string.',
            'description.string' => 'The description must be a string.',
            'linkedIn_company_page.url' => 'The LinkedIn company page must be a valid URL.',
        ];
    }
}
