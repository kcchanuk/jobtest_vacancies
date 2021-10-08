@extends('layouts.main')

@section('title'){{ __('general.update_vacancy') }}@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1 class="h3">{{ __('general.update_vacancy') }}</h1>

                @include('flash::message')
                @include('errors.alert')

                <form method="POST" action="{{ route('vacancies.update', $vacancy) }}" accept-charset="UTF-8">
                    @method('PUT')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @include('vacancies.vacancy_fields', ['vacancy' => $vacancy])

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('general.submit') }}</button>
                        </div>
                    </div>
                </form>

                {{-- Form to delete a vacancy --}}
                <form id="form_delete" method="POST" action="{{ route('vacancies.destroy', $vacancy) }}"
                      accept-charset="UTF-8" class="mt-4" @submit="confirmDelete">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">{{ __('general.delete_vacancy') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    {{-- The user needs to confirm before deleting a vacancy --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js"
            integrity="sha512-XdUZ5nrNkVySQBnnM5vzDqHai823Spoq1W3pJoQwomQja+o4Nw0Ew1ppxo5bhF2vMug6sfibhKWcNJsG8Vj9tg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new Vue({
            el: '#form_delete',
            methods: {
                confirmDelete: function (e) {
                    if (!confirm('{{ __('general.confirm_delete_vacancy') }}')) {
                        e.preventDefault();
                    }
                }
            }
        });
    </script>
@endpush
