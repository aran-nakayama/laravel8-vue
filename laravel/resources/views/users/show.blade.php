@extends('apptechpit')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
            <i class="fas fa-user-circle fa-3x"></i>
        </div>
        <h2 class="h5 card-title m-0">
          <p class="text-dark mt-2">
            {{ $user->name }}のマイページ
          </p>
        </h2>
      </div>
    </div>
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>

@endsection
