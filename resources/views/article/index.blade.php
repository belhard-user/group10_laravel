@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('news.create') }}" class="btn btn-danger btn-lg">
                {{ trans('other.создать') }}
            </a>
        </div>
    </div>
    @foreach($articles as $article)
        <article>
            <h3>
                <a href="{{ route('news.view', ['article' => $article->slug]) }}">{{ $article->title }}</a>
            </h3>
            <p>{{ $article->short_description }}</p>
        </article>
    @endforeach
@endsection