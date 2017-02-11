@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-warning" href="{{ route('news.edit', ['article' => $article->slug]) }}">Редактировать</a>
        </div>
    </div>
    <h2>{{ $article->title }}</h2>
    <p>{{ $article->body }}</p>
    @if($article->tag->count())
        <ul>
            @foreach($article->tag as $tag)
            <li>{{ $tag->title }}</li>
            @endforeach
        </ul>
    @endif
    <hr>

    {{ Form::open(['route' => ['news.comment', 'article' => $article->slug]]) }}
        <div class="form-group">
            {{ Form::label('message', 'Коментарий') }}
            {{ Form::textarea('message', null, ['class' => 'form-control']) }}
        </div>
    <button class="btn btn-primary">Добавить коментарий</button>
    {{ Form::close() }}

    @unless($article->comment->isEmpty())
    <hr>
        @foreach($article->comment as $comment)
            <p class="alert alert-success">
                <span style="font-size: 60%;color:red" class="small">{{ $comment->user->name }}</span>
                {{ $comment->message }}
            </p>
        @endforeach
    @endunless
@endsection