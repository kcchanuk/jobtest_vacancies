@extends('layouts.main')

@section('title'){{ $vacancy->job_title }}@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1 class="h3">{{ $vacancy->job_title }}</h1>

                @include('vacancies.location_and_salary')

                <strong>{{ __('general.short_desc') }}</strong><br>
                <div class="mb-3">
                    {!! nl2br(e($vacancy->short_desc)) !!}
                </div>

                <strong>{{ __('general.long_desc') }}</strong><br>
                <div class="mb-3">
                    {!! nl2br(e($vacancy->long_desc)) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
