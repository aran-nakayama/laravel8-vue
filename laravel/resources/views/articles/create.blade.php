@extends('apptechpit')

@section('title', '記事投稿')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}">
                @include('articles.form')
                <button type="submit" class="btn green btn-block text-white">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
