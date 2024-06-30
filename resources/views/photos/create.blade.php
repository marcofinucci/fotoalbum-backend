@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Nuova foto'])

  {{-- Form --}}
  <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Title --}}
    <div class="mb-5">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" name="title" id="title" placeholder="Lorem ipsum dolor sit..." value="{{old('title')}}"
        class="form-control @error('title') is-invalid @enderror" />
      @error('title')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Image --}}
    <div class="mb-5">
      <label for="image" class="form-label">Immagine</label>
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
    <div class="mb-5">
      <label for="category_id">Categorie</label>
      <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option disabled selected>Nessuna</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected':''}}>{{$category->name}}
        </option>
        @endforeach
      </select>
      @error('category_id')
      <div>{{$message}}</div>
      @enderror
    </div>

    {{-- Featured --}}
    <div class="form-check form-switch mb-5">
      <input class="form-check-input" type="checkbox" role="switch" id="featured" name="featured">
      <label class="form-check-label" for="featured">In evidenza</label>
    </div>

    {{-- Description --}}
    <div class="mb-5">
      <label for="description" class="form-label">Descrizione</label>
      <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
        rows="5" />{{old('description')}}</textarea>
      @error('description')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
    </div>

    {{-- Actions --}}
    <button class="btn btn-primary" type="submit">Aggiungi foto</button>
  </form>
</div>
@endsection