<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VacancyFilterRequest extends FormRequest
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
     * Request to filter vacancies
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_title' => $this->nullableTextRule(),
            'location' => $this->nullableTextRule(),
            'salary' => $this->nullableUnsignedIntegerRule(),
        ];
    }

    /**
     * Return filter parameters from default or user input
     *
     * @return array
     */
    public function getFilterParams(): array
    {
        // Default filter data
        $data = [
            'job_title' => null,
            'location' => null,
            'salary' => null
        ];

        // Merge default data with validated user input
        return array_merge($data, $this->validated());
    }
}
