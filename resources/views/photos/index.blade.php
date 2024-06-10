@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-secondary mb-5">Le tue foto</h1>


  @if($photos)

  <div class="table-responsive">
    <table class="table my-table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titolo</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($photos as $photo)
        <tr>
          <th scope="row">{{$photo->id}}</th>
          <td>{{$photo->title}}</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Paginazione -->
  {{$photos->links('pagination::bootstrap-5')}}

  @else
  <p>Nessun photo da mostrare</p>
  @endif

</div>
@endsection