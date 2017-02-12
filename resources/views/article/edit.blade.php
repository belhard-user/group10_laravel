@extends('layouts.app')

@section('content')
    {{ Form::model($article, ['route' => ['news.update', 'article' => $article->slug], 'method' => 'put', 'files' => true]) }}
    @include('article.form', ['btnText' => 'Обновить'])
    {{ Form::close() }}
@endsection

