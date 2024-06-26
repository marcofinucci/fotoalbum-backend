<section>
  <header>
    <h2 class="h4">
      {{ __('Update Password') }}
    </h2>
    <p class="mt-1 text-sm text-gray-600">
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-6">
    @csrf
    @method('put')
    <div class="mb-4">
      <label for="current_password">{{__('Current Password')}}</label>
      <input class="mt-1 form-control" type="password" name="current_password" id="current_password"
        autocomplete="current-password">
      @error('current_password')
      <span class="invalid-feedback mt-2" role="alert">
        {{ $errors->updatePassword->get('current_password') }}
      </span>
      @enderror
    </div>
    <div class="mb-4">
      <label for="password">{{__('New Password')}}</label>
      <input class="mt-1 form-control" type="password" name="password" id="password" autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback mt-2" role="alert">
        {{ $errors->updatePassword->get('password')}}
      </span>
      @enderror
    </div>
    <div class="mb-4">
      <label for="password_confirmation">{{__('Confirm Password')}}</label>
      <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation"
        autocomplete="new-password">
      @error('password_confirmation')
      <span class="invalid-feedback mt-2" role="alert">
        {{ $errors->updatePassword->get('password_confirmation')}}
      </span>
      @enderror
    </div>
    <div class="d-flex align-items-center gap-4">
      <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      @if (session('status') === 'password-updated')
      <script>
        const show = true;
        setTimeout(() => show = false, 2000)
        const el = document.getElementById('status')
        if (show) {
          el.style.display = 'block';
        }
      </script>
      <div id='status' class="text-success">{{ __('Saved.') }}</div>
      @endif
    </div>
  </form>
</section>