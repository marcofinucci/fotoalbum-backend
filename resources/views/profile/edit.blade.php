@extends('layouts.app')

@section('content')
<div class="container">
  {{-- Title --}}
  @include('partials.title', ['title' => 'Profilo'])

  <div class="card p-4 mb-5">
    @include('profile.partials.update-profile-information-form')
  </div>

  <div class="card p-4 mb-5">
    @include('profile.partials.update-password-form')
  </div>

  <div class="card p-4">
    @include('profile.partials.delete-user-form')
  </div>
</div>
@endsection