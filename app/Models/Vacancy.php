<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    // Mass assignment
    protected $fillable = ['job_title', 'location', 'short_desc', 'long_desc', 'min_salary', 'max_salary'];
}
