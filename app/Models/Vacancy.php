<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    // Mass assignment
    protected $fillable = [
        'job_title',
        'location',
        'short_desc',
        'long_desc',
        'min_salary',
        'max_salary'
    ];

    /**
     * Scope to filter job title
     *
     * @param Builder $query
     * @param string $jobTitle
     * @return void
     */
    #[Scope]
    protected function filterJobTitle(Builder $query, string $jobTitle): void
    {
        $query->where('job_title', 'like', '%' . $jobTitle . '%');
    }

    /**
     * Scope to filter location
     *
     * @param Builder $query
     * @param string $location
     * @return void
     */
    #[Scope]
    protected function filterLocation(Builder $query, string $location): void
    {
        $query->where('location', 'like', '%' . $location . '%');
    }

    /**
     * Scope to filter salary
     *
     * @param Builder $query
     * @param int $salary
     * @return void
     */
    #[Scope]
    protected function filterSalary(Builder $query, int $salary): void
    {
        $query->whereValueBetweenwhereValueBetween($salary, ['min_salary', 'max_salary']);
    }
}
