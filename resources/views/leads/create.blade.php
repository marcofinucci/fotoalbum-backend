@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Contatta lo sviluppatore'])

  {{-- Form --}}
  <form action="{{route('leads.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Name --}}
    <div class="mb-5">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" id="name" value="{{old('name', Auth::user()->name)}}"
        class="form-control my-input @error('name') is-invalid @enderror" />
      @error('name')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Email --}}
    <div class="mb-5">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" value="{{old('email', Auth::user()->email)}}"
        class="form-control my-input @error('email') is-invalid @enderror" />
      @error('email')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Message --}}
    <div class="mb-5">
      <label for="message" class="form-label">Messaggio</label>
      <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
        rows="5" />{{old('message')}}</textarea>
      @error('message')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Actions --}}
    <button class="btn btn-primary" type="submit">Invia messaggio</button>
  </form>
  
</div>
@endsection