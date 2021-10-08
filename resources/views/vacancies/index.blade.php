@extends('layouts.main')

@section('title'){{ __('general.vacancies') }}@endsection

@section('content')
    <div class="container my-5">
        @include('flash::message')
        @include('errors.alert')

        <div class="row">
            <div class="col-xl-3">
                @include('vacancies.filter_form')
            </div>

            <div class="col-xl-9">
                <div id="available_vacancies" class="d-flex justify-content-xl-between align-items-center mb-3">
                    <div>
                        {{ __('general.available_vacancies') }} ({{ $vacancies->count() }})
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('vacancies.create') }}"
                           role="button">{{ __('general.add_new_vacancy') }}</a>
                    </div>
                </div>

                @if ($vacancies->isNotEmpty())
                    @foreach ($vacancies as $vacancy)
                        @include('vacancies.vacancy_item')
                    @endforeach

                    <div class="mt-3">
                        {{ $vacancies->appends($filters)->links() }}
                    </div>
                @else
                    <p>{{ __('general.no_vacancies') }}</p>
                @endif

            </div>
        </div>
    </div>
@endsection
