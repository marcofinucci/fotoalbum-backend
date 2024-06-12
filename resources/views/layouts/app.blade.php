<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Title --}}
  <title>Backend | Foto Album</title>

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
      {{-- Message status --}}
      @if(session('status'))
      <div class="container">
        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
          <span>{{session('status')}}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif

      {{-- Content --}}
      @yield('content')
    </main>
  </div>
</body>

</html>