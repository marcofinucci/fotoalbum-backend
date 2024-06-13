@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @if($photo->featured)
  <div class="text-primary mb-1">
    <i class="bi bi-star-fill"></i> <span>In evidenza</span>
  </div>
  @endif
  <h1 class="h2 mb-4">{{ $photo->title }}</h1>

  <div class="mb-5">
    {{-- Slug --}}
    <div>
      <span class="text-secondary-emphasis">Slug: </span>
      <span>{{$photo->slug}}</span>
    </div>
    {{-- Categoria --}}
    <div>
      <span class="text-secondary-emphasis">Categoria: </span>
      @if ($photo->category)
      <span>{{ $photo->category->name }}</span>
      @else
      <span>Nessuna</span>
      @endif
    </div>
  </div>

  {{-- Description --}}
  @if ($photo->description)
  <div class="fs-4 mb-5">{{ $photo->description }}</div>
  @endif

  {{-- Image --}}
  <div class="mb-5">
    @if (Str::startsWith($photo->image, 'http'))
    <img class="img-fluid rounded" src="{{$photo->image}}" alt="{{$photo->title}}" />
    @else
    <img class="img-fluid rounded" src="{{asset('storage/'.$photo->image)}}" alt="{{$photo->title}}" />
    @endif
  </div>

  {{-- Actions --}}
  <div>
    <a class="btn btn-secondary" href="{{route('photos.index')}}">Indietro</a>
    <a class="btn btn-primary" href="{{route('photos.edit', $photo)}}">Modifica foto</a>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
      Elimina foto
    </button>
  </div>

  {{-- Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Sei sicuro di voler eliminare la foto?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Premi su elimina se vuoi cancellare definitivamente la foto <strong>{{ $photo->title }}</strong>.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <form action="{{route('photos.destroy', $photo)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection