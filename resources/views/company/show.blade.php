@extends('layouts.app')

@section('title', 'Detail Company')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">
                    {{ __('Back to List') }}
                </a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Detail Company') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $company->name) }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $company->email) }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website', $company->website) }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                @if ($company->logo)
                                    <img src="{{ Storage::url($company->logo) }}" alt="Logo {{ $company->name }}" class="img-fluid" style="max-height: 150px;">
                                @else
                                    <p class="form-control-plaintext text-muted">{{ __('No logo uploaded') }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="created_at" class="col-md-4 col-form-label text-md-end">{{ __('Created At') }}</label>

                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control" name="created_at" value="{{ old('created_at', $company->created_at->format('d M Y H:i')) }}" readonly>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection