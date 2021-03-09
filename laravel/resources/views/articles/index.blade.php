@extends('apptechpit')

@section('title','記事一覧')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
              <show-article :authorized="@json(Auth::check())">
              </show-article>
          </div>
        </div>
      </div>
    </div>
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
