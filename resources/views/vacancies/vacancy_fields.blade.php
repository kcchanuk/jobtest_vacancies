<div class="row">
    <div class="col-xl-6">
        <div class="row mb-3">
            <label for="job_title"
                   class="col-xl-3 col-form-label required">{{ __('general.job_title') }}</label>
            <div class="col-xl-9">
                <input name="job_title" id="job_title" type="text"
                       class="form-control @error('job_title') is-invalid @enderror"
                       value="{{ old('job_title', optional($vacancy)->job_title) }}"
                       placeholder="{{ __('general.job_title') }}"
                       required maxlength="191">

                @error('job_title')
                <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="location"
                   class="col-xl-3 col-form-label required">{{ __('general.location') }}</label>
            <div class="col-xl-9">
                <input name="location" id="location" type="text"
                       class="form-control @error('location') is-invalid @enderror"
                       value="{{ old('location', optional($vacancy)->location) }}"
                       placeholder="{{ __('general.location') }}"
                       required maxlength="191">

                @error('location')
                <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="min_salary"
                   class="col-xl-3 col-form-label required">{{ __('general.min_salary') }}</label>
            <div class="col-xl-9">
                <div class="input-group">
                    <span class="input-group-text">£</span>
                    <input name="min_salary" id="min_salary" type="number"
                           class="form-control @error('min_salary') is-invalid @enderror"
                           value="{{ old('min_salary', optional($vacancy)->min_salary) }}"
                           placeholder="{{ __('general.min_salary') }}"
                           required min="1" max="999999999" step="1">
                    @error('min_salary')
                    <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="max_salary"
                   class="col-xl-3 col-form-label required">{{ __('general.max_salary') }}</label>
            <div class="col-xl-9">
                <div class="input-group">
                    <span class="input-group-text">£</span>
                    <input name="max_salary" id="max_salary" type="number"
                           class="form-control @error('max_salary') is-invalid @enderror"
                           value="{{ old('max_salary', optional($vacancy)->max_salary) }}"
                           placeholder="{{ __('general.max_salary') }}"
                           required min="1" max="999999999" step="1">
                    @error('max_salary')
                    <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="row mb-3">
            <label for="short_desc"
                   class="col-xl-3 col-form-label required">{{ __('general.short_desc') }}</label>

            <div class="col-xl-9">
        <textarea name="short_desc" id="short_desc"
                  class="form-control @error('short_desc') is-invalid @enderror"
                  placeholder="{{ __('general.short_desc') }}" maxlength="16383"
                  cols="50" rows="2">{{ old('short_desc', optional($vacancy)->short_desc) }}</textarea>

                @error('short_desc')
                <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="long_desc"
                   class="col-xl-3 col-form-label required">{{ __('general.long_desc') }}</label>

            <div class="col-xl-9">
        <textarea name="long_desc" id="long_desc"
                  class="form-control @error('long_desc') is-invalid @enderror"
                  placeholder="{{ __('general.long_desc') }}" maxlength="16383"
                  cols="50" rows="5">{{ old('long_desc', optional($vacancy)->long_desc) }}</textarea>

                @error('long_desc')
                <div class="invalid-feedback">{{ $message}}</div>
                @enderror
            </div>
        </div>
    </div>
</div>


