@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Le tue foto'])

  {{-- Table --}}
  @if($photos)
  <div class="table-responsive">
    <table class="table my-table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Titolo</th>
          <th scope="col">Slug</th>
          <th class="my-table-featured" scope="col">In evidenza</th>
          <th class="my-table-actions" scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        {{-- Photo row --}}
        @foreach ($photos as $photo)
        <tr>
          <td class="my-table-image">
            <div class="my-table-image-wrap">
              <img class="img-fluid" src="{{$photo->image}}" />
            </div>
          </td>
          <td>{{$photo->title}}</td>
          <td>{{$photo->slug}}</td>
          <td class="my-table-featured">
            @if($photo->featured)
            <i class="bi bi-star-fill"></i>
            @else
            <i class="bi bi-star"></i>
            @endif
          </td>
          <th class="my-table-actions">
            <a class="btn btn-secondary btn-sm" href="{{route('photos.show', $photo)}}" data-bs-toggle="tooltip"
              data-bs-title="Guarda la foto">
              <i class="bi bi-eye"></i>
            </a>
            <a class="btn btn-outline-secondary btn-sm" href="{{route('photos.destroy', $photo)}}"
              data-bs-toggle="tooltip" data-bs-title="Elimina la foto">
              <i class="bi bi-trash"></i>
            </a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  {{$photos->links('pagination::bootstrap-5')}}

  @else
  <div>Nessuns photo da mostrare</div>
  @endif

</div>
@endsection