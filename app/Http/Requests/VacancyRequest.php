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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'job_title' => $this->textRule(),
            'location' => $this->textRule(),

            'short_desc' => $this->textareaRule(),
            'long_desc' => $this->textareaRule(),

            'min_salary' => $this->unsignedIntegerRule(),
            'max_salary' => $this->unsignedIntegerRule(),
        ];

        // Special rules for min_salary and max_salary
        $rules['min_salary'][] = 'lte:max_salary';
        $rules['max_salary'][] = 'gte:min_salary';

        return $rules;
    }
}
