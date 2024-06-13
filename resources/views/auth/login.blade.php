<?php use App\Models\User; ?>

@extends('layouts.guest')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4 row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="mb-4 row mb-0">
              <div class="col-md-8 offset-md-4 d-flex flex-column d-lg-block">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link text-secondary-emphasis mt-3 mt-lg-0" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif

                @if (User::count() == 0)
                <div class="mt-5">
                  <hr>
                  <span class="text-secondary">{{ __('Don\'t have an account?') }}</span>
                  <a class="text-secondary-emphasis" href="{{ route('register') }}"">
                  {{ __('Register') }}
                </a>
                </div>
                @endif
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection