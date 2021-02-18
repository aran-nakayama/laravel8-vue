@extends('apptechpit')

@section('title','記事一覧')

@section('content')
  @include('nav') {{--ナビバーを追加している--}}
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
