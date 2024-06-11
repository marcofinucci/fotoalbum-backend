<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Title --}}
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Usando Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <div id="app" class="app-guest">
    <main id="app-main">
      <div class="my-logo text-secondary-emphasis">PHOTO ALBUM</div>
      @yield('content')
    </main>
  </div>
</body>

</html>