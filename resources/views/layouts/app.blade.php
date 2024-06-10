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
  <div id="app" class="app-admin">
    {{-- Sidebar --}}
    <aside id="app-sidebar">
      @include('partials.sidebar')
    </aside>
    {{-- Main --}}
    <main id="app-main">
      @yield('content')
    </main>
  </div>
</body>

</html>