@extends('layouts.app')

@section('content')
    {{ Form::open(['url' => 'files/upload', 'files' => true]) }}
    {{ Form::file('image') }}
    <button>click</button>
    {{ Form::close() }}
@endsection