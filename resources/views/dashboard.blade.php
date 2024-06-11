@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Dashboard'])

  {{-- Actions --}}
  <div>
    <h2 class="fs-4 fw-normal mb-4">Ciao {{ Auth::user()->name }}, cosa vuoi fare oggi?</h2>
    <a href="{{ route('photos.create') }}" class="btn btn-primary">Crea una nuova immagine</a>
    <a href="{{ route('photos.index') }}" class=" btn btn-secondary">Vista le tue immagini</a>
  </div>

  {{-- Profile --}}
  <div>
    <hr class="my-5">
    <h2 class="fs-4 fw-normal mb-4">Profilo</h2>
    <div><span class="text-secondary-emphasis">nome:</span> {{ Auth::user()->name }}</div>
    <div><span class="text-secondary-emphasis">email:</span> {{ Auth::user()->email }}</div>
    <div class="mt-2"><a href="{{ route('profile.edit') }}">Modifica il tuo profilo</a>
      <div>
      </div>
    </div>
    @endsection