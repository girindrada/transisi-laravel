@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        <!-- Company dropdown with ajax and select2 -->
                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>
                            <div class="col-md-6">
                                <select name="company_id" id="company" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Employee') }}
                                </button>

                                <a href="{{ route('employees.index') }}" class="btn btn-secondary ms-2">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        console.log('jquery ready...');

        $('#company').select2({
            placeholder: '-- Select Company --',
            ajax: {
                url: '{{ route('api.companies') }}',
                dataType: 'json',
                delay: 250, // delay before sending new request
                data: function (params) {
                    // send search term and page number to the server 
                    return {
                        search: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data) {
                    console.log('API response:', data.data);
                    return {
                        results: data.data.map(function (company) {
                            return { 
                                id: company.id, 
                                text: company.name 
                            };
                        }),
                        pagination: {
                            more: data.current_page < data.last_page,
                        },
                    };
                },
            },
        });
    });
</script>
@endpush