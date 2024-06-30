@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Modifica foto'])

  {{-- Form --}}
  <form action="{{route('photos.update', $photo)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Title --}}
    <div class="mb-4">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" name="title" id="title" placeholder="Lorem ipsum dolor sit..."
        value="{{{old('title', $photo->title)}}}" class="form-control @error('title') is-invalid @enderror" />
      @error('title')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Image --}}
    <div class="mb-4">
      <div class="mb-4">
        @if (Str::startsWith($photo->image, 'http'))
        <img class="img-fluid rounded" src="{{$photo->image}}" alt="{{$photo->title}}" />
        @else
        <img class="img-fluid rounded" src="{{asset('storage/'.$photo->image)}}" alt="{{$photo->title}}" />
        @endif
      </div>
      <label for="image" class="form-label">Nuova immagine</label>
      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
        aria-describedby="imageHelpBlock" />
      <div id="imageHelpBlock" class="form-text">
        L'immagine deve avere una dimensione massima di 2MB e di tipo: png, jpg, jpeg.
      </div>
      @error('image')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Category --}}
    <div class="mb-4">
      <label for="category_id">Categorie</label>
      <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option disabled selected>Nessuna</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{old('category_id' , $photo->category_id) == $category->id ? 'selected' :
          ''}}>{{$category->name}}
        </option>
        @endforeach
      </select>
      @error('category_id')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Featured --}}
    <div class="form-check form-switch mb-4">
      <input class="form-check-input" type="checkbox" role="switch" id="featured" name="featured" {{old('featured',
        $photo->featured) ? 'checked' : ''}}>
      <label class="form-check-label" for="featured">In evidenza</label>
    </div>

    {{-- Description --}}
    <div class="mb-4">
      <label for="description" class="form-label">Descrizione</label>
      <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
        rows="5" />{{old('description', $photo->description)}}</textarea>
      @error('description')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Actions --}}
    <div class="d-flex flex-column align-items-start d-lg-block">
      <a class="btn btn-secondary" href="{{route('photos.index')}}">Indietro</a>
      <button class="btn btn-primary mt-2 mt-lg-0" type="submit">Salva modifiche</button>
      <button type="button" class="btn btn-danger mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Elimina foto
      </button>
    </div>
  </form>

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