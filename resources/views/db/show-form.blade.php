@extends('layouts.app')


@section('content')
    <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="number" name="age" placeholder="age"><br>
        <button>click</button>
    </form>
@endsection