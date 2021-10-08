@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>{{ __('errors.input_invalid') }}</strong>
    </div>
@endif