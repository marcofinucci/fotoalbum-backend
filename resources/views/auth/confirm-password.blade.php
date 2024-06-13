@extends('layouts.guest')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">{{ __('Confirm Password') }}</div>

        <div class="card-body">
          {{ __('Please confirm your password before continuing.') }}

          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4 row">
              <label for="password" class="col-lg-4 col-form-label text-lg-right">{{ __('Password') }}</label>

              <div class="col-lg-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
                @enderror
              </div>
            </div>

            <div class="mb-4 row mb-0">
              <div class="col-lg-8 offset-lg-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
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