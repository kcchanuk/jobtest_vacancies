<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'job_title' => 'bail|required|max:191',
            'location' => 'bail|required|max:191',

            'short_desc' => 'bail|required|max:16383',
            'long_desc' => 'bail|required|max:16383',
        ];

        // Only use max_salary if it is in the request and is valid
        if ($this->filled('max_salary') and is_numeric($this->max_salary) and
            ($this->max_salary >= 1) and ($this->max_salary <= 999999999)) {
            $rules['min_salary'] = 'bail|required|integer|min:1|max:' . $this->max_salary;
        } else {
            $rules['min_salary'] = 'bail|required|integer|min:1|max:999999999';
        }

        // Only use min_salary if it is in the request and is valid
        if ($this->filled('min_salary') and is_numeric($this->min_salary) and
            ($this->min_salary >= 1) and ($this->min_salary <= 999999999)) {
            $rules['max_salary'] = 'bail|required|integer|min:' . $this->min_salary . '|max:999999999';
        } else {
            $rules['max_salary'] = 'bail|required|integer|min:1|max:999999999';
        }

        return $rules;
    }

    /**
     * Define custom error messages
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
