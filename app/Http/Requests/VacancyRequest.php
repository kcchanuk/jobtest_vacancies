<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    use CommonRuleTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Request to create or update a vacancy.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'job_title' => $this->requiredTextRule(),
            'location' => $this->requiredTextRule(),

            'short_desc' => $this->requiredTextareaRule(),
            'long_desc' => $this->requiredTextareaRule(),

            'min_salary' => $this->requiredUnsignedIntegerRule(),
            'max_salary' => $this->requiredUnsignedIntegerRule(),
        ];

        // Special rules for min_salary and max_salary
        $rules['min_salary'][] = 'lte:max_salary';
        $rules['max_salary'][] = 'gte:min_salary';

        return $rules;
    }
}
