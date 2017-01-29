@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'news.store']) }}
        @include('article.form', ['btnText' => 'Создать'])
    {{ Form::close() }}
@endsection