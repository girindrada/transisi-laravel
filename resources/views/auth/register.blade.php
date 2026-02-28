@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="fw-semibold text-center mb-3">{{ __('Register') }}</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="bg-light rounded p-3 mb-3">

                            <div class="row align-items-center mb-3">
                                <label for="name" class="col-md-2 col-auto col-form-label fw-medium">name</label>
                                <div class="col">
                                    <input id="name" type="text" class="form-control col-md-10 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">
                                <label for="email" class="col-md-2 col-form-label fw-medium">email</label>
                                <div class="col">
                                    <input id="email" type="email" class="form-control col-md-10 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">
                                <label for="password" class="col-md-2 col-form-label fw-medium">password</label>
                                <div class="col">
                                    <input id="password" type="password" class="form-control col-md-10 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center mb-0">
                                <label for="password-confirm" class="col-md-2 col-form-label fw-medium">Pass confirm</label>
                                <div class="col">
                                    <input id="password-confirm" type="password" class="form-control col-md-10 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                    
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-muted small">already have an account? login here</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
