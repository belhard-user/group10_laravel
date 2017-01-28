@extends('layouts.app')


@section('content')

    {{ Form::model($model, ['action' => ['DBController@updateForm', 'id' => $model->id], 'method' => 'put']) }}
    @include('db.partials', ['btnText' => 'Обновить'])
    {{ Form::close() }}

    {{--<form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="number" name="age" placeholder="age"><br>
        <button>click</button>
    </form>--}}
@endsection