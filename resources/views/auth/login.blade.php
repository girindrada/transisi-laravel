@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="fw-semibold mb-3 text-center">{{ __('Login') }}</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="bg-light rounded p-3 mb-3">
                            <div class="row align-items-center mb-3">
                                <label for="email" class="col-md-2 col-form-label fw-medium">email</label>
                                <div class="col">
                                    <input id="email" type="email" class="form-control col-md-10 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center mb-0">
                                <label for="password" class="col-md-2 col-form-label fw-medium">password</label>
                                <div class="col">
                                    <input id="password" type="password" class="form-control col-md-10 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-end mb-3">
                                <a href="{{ route('password.request') }}" class="text-muted small">forget password?</a>
                            </div>
                        @endif

                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Login') }}
                            </button>
                        </div>

                        @if (Route::has('register'))
                            <div class="text-center">
                                <a href="{{ route('register') }}" class="text-muted small">register here</a>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
