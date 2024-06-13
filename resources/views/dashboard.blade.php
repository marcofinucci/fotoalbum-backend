@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Dashboard'])

  {{-- Actions --}}
  <div>
    <h2 class="fs-4 fw-normal mb-4">Ciao {{ Auth::user()->name }}, cosa vuoi fare oggi?</h2>
    <div class="d-flex flex-column align-items-start d-lg-block">
      <a href="{{ route('photos.create') }}" class="btn btn-primary">Inserisci una foto</a>
      <a href="{{ route('photos.index') }}" class=" btn btn-secondary mt-2 mt-lg-0">Vista le tue foto</a>
    </div>
  </div>

  {{-- Profile --}}
  <div>
    <hr class="my-5">
    <h2 class="fs-4 fw-normal mb-4">Profilo</h2>
    <div><span class="text-secondary-emphasis">nome:</span> {{ Auth::user()->name }}</div>
    <div><span class="text-secondary-emphasis">email:</span> {{ Auth::user()->email }}</div>
    <div class="mt-2"><a href="{{ route('profile.edit') }}">Modifica il tuo profilo</a></div>
  </div>
</div>
@endsection