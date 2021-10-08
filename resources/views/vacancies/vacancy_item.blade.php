<div class="card vacancy-item mb-3">
    <div class="card-body">
        <div>
            <h3>{{ $vacancy->job_title }}</h3>
        </div>
        @include('vacancies.location_and_salary')
        <div class="mb-3">
            {!! nl2br(e($vacancy->short_desc)) !!}
        </div>
        <div>
            <a class="btn btn-secondary me-2" href="{{ route('vacancies.show', $vacancy) }}"
               role="button">{{ __('general.more_details') }}</a>
            <a class="btn btn-primary" href="{{ route('vacancies.edit', $vacancy) }}"
               role="button">{{ __('general.update_vacancy') }}</a>
        </div>
    </div>
</div>
