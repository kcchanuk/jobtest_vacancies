<div id="filter_vacancies">
    <h2>{{ __('general.filter_vacancies') }}</h2>

    <form method="GET" action="{{ route('vacancies.index') }}" accept-charset="UTF-8">
        <input name="job_title" id="job_title" type="text" value="{{ $filters['job_title'] }}"
               class="form-control mb-2" placeholder="{{ __('general.job_title') }}"
               maxlength="191">

        <input name="location" id="location" type="text" value="{{ $filters['location'] }}"
               class="form-control mb-2" placeholder="{{ __('general.location') }}"
               maxlength="191">

        <div class="input-group mb-2">
            <span class="input-group-text">£</span>
            <input name="salary" id="salary" type="number" value="{{ $filters['salary'] }}"
                   class="form-control" placeholder="{{ __('general.salary') }}"
                   min="1" max="999999999" step="1">
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">{{ __('general.filter_results') }}</button>
        </div>
    </form>
</div>
