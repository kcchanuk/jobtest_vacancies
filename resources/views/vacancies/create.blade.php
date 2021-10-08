@extends('layouts.main')

@section('title'){{ __('general.add_vacancy') }}@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1 class="h3">{{ __('general.add_vacancy') }}</h1>

                @include('flash::message')
                @include('errors.alert')

                <form method="POST" action="{{ route('vacancies.store') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @include('vacancies.vacancy_fields', ['vacancy' => null])

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
