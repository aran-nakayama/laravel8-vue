@extends('apptechpit')

@section('title','記事一覧')

@section('content')
  @include('nav') {{--ナビバーを追加している--}}
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <show-article>
              </show-article>
            </div>
          </div>
        </div>
      </div>
    </div>
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection
