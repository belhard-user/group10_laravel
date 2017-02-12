@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'news.store', 'files' => true]) }}
        @include('article.form', ['btnText' => 'Создать'])
    {{ Form::close() }}
@endsection