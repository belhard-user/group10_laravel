@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-warning" href="{{ route('news.edit', ['article' => $article->slug]) }}">Редактировать</a>
        </div>
    </div>
    <h2>{{ $article->title }}</h2>
    <p>{{ $article->body }}</p>
@endsection