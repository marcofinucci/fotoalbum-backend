@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="fs-4 text-secondary my-4">
    {{ __('Dashboard') }}
  </h2>


  @if($photos)

  @foreach ($photos as $photo)
  <h2>{{$photo->title}}</h2>
  @endforeach

  <!-- Paginazione -->
  {{$photos->links('pagination::bootstrap-5')}}

  @else
  <p>Nessun photo da mostrare</p>
  @endif

</div>
@endsection