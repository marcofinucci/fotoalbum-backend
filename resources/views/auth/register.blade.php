@extends('layouts.guest')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4 row">
              <label for="name" class="col-lg-4 col-form-label text-lg-right">{{ __('Name') }}</label>

              <div class="col-lg-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="email" class="col-lg-4 col-form-label text-lg-right">{{ __('E-Mail Address') }}</label>

              <div class="col-lg-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Password') }}</label>

              <div class="col-lg-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row">
              <label for="password-confirm" class="col-lg-4 col-form-label text-lg-right">{{ __('Confirm Password')
                }}</label>

              <div class="col-lg-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">
              </div>
            </div>

            <div class="mb-4 row mb-0">
              <div class="col-lg-6 offset-lg-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection