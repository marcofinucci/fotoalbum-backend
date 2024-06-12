@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Le tue foto'])

  {{-- Table --}}
  @if($photos->count() > 0)
  <div class="table-responsive">
    <table class="table my-table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Titolo</th>
          <th scope="col">Categoria</th>
          <th class="my-table-featured" scope="col">In evidenza</th>
          <th class="my-table-actions" scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        {{-- Photo row --}}
        @foreach ($photos as $photo)
        <tr>
          {{-- Image --}}
          <td class="my-table-image">
            <div class="my-table-image-wrap">
              @if (Str::startsWith($photo->image, 'http'))
              <img class="img-fluid rounded" src="{{$photo->image}}" alt="{{$photo->title}}" />
              @else
              <img class="img-fluid rounded" src="{{asset('storage/'.$photo->image)}}" alt="{{$photo->title}}" />
              @endif
            </div>
          </td>
          {{-- Title --}}
          <td><a class="link-light link-underline link-underline-opacity-0 link-underline-opacity-100-hover"
              href="{{route('photos.show', $photo)}}">{{$photo->title}}</a>
          </td>
          {{-- Category --}}
          <td>
            @if ($photo->category)
            <span class="text-secondary-emphasis">{{ $photo->category->name }}</span>
            @else
            <span class="text-secondary-emphasis">Nessuna</span>
            @endif
          </td>
          {{-- Featured --}}
          <td class="my-table-featured">
            @if($photo->featured)
            <i class="bi bi-star-fill"></i>
            @else
            <i class="bi bi-star"></i>
            @endif
          </td>
          {{-- Actions --}}
          <th class="my-table-actions">
            <a class="btn btn-secondary btn-sm" href="{{route('photos.show', $photo)}}" data-bs-toggle="tooltip"
              data-bs-title="Guarda foto">
              <i class="bi bi-eye"></i>
            </a>
            <a class="btn btn-secondary btn-sm" href="{{route('photos.edit', $photo)}}" data-bs-toggle="tooltip"
              data-bs-title="Modifica foto">
              <i class="bi bi-pencil"></i>
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
  <div>Spiacente, non hai nessuna foto da visualizzare. <a href="{{route('photos.create')}}">Aggiungi una nuova foto</a>
    per iniziare.</div>
</div>
@endif

</div>
@endsection