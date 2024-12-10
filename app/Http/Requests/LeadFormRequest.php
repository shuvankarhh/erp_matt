<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadFormRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'leads_group_id' => 'required|exists:crm_leads_groups,id',
            'leads_organization_id' => 'required|exists:crm_leads_organization,id',
            'phone' => 'required|string|unique:crm_leads,phone',
            'phone_type' =>  'required|string|in:Home,Office,Work',
            'email' => 'required|email|unique:crm_leads,email',
            'website' => 'required|string|unique:crm_leads,website',
            'address' => 'required|max:255',
            'status' => 'required|in:0,1',
            // 'status' => 'required|in:active,inactive',
            'city_id' => 'nullable',
            // 'city_id' => 'nullable|exists:cities,id',
            // 'city_id' => 'required|exists:cities,id',
            'state_id' => 'nullable',
            // 'state_id' => 'nullable|exists:states,id',
            // 'state_id' => 'required|exists:states,id',
            'country_id' => 'nullable',
            // 'country_id' => 'nullable|exists:countries,id',
            // 'country_id' => 'required|exists:countries,id',
        ];
    }
}
