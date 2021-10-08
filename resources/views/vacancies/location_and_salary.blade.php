<div class="mb-3">
    <span class="me-5"><i class="fas fa-map-marker-alt green"></i> {{ $vacancy->location }}</span>
    <span><i class="fas fa-pound-sign green"></i>
                @if ($vacancy->min_salary != $vacancy->max_salary)
            {{ number_format($vacancy->min_salary) }} - {{ number_format($vacancy->max_salary) }}
        @else
            {{ number_format($vacancy->min_salary) }}
        @endif
            </span>
</div>
