@extends('layouts.app')

@section('title', 'Detail Employee')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    {{ __('Back to List') }}
                </a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Detail Employee') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $employee->name) }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $employee->email) }}" readonly>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $employee->company->name }}" readonly>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Company Website') }}</label>

                            <div class="col-md-6">
                                <input id="company_website" type="text" class="form-control" name="company_website" value="{{ $employee->company->website }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="company_email" class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                            <div class="col-md-6">
                                <input id="company_email" type="text" class="form-control" name="company_email" value="{{ $employee->company->email }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                @if ($employee->company->logo)
                                    <img src="{{ Storage::url($employee->company->logo) }}" alt="Logo {{ $employee->company->name }}" class="img-fluid" style="max-height: 100px;">
                                @else
                                    <p class="form-control-plaintext text-muted">{{ __('No logo uploaded') }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Created At') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control" name="created_at" value="{{ old('created_at', $employee->created_at->format('d M Y H:i')) }}" readonly>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection