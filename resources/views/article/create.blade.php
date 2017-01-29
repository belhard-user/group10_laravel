@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('news.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Названи</label>
            <input type="text" class="form-control" id="title" placeholder="Название" name="title">
        </div>
        <div class="form-group">
            <label for="short_description">Короткое описание</label>
            <textarea type="text" class="form-control" id="short_description" placeholder="Короткое описание" name="short_description"></textarea>
        </div>
        <div class="form-group">
            <label for="body">Описание</label>
            <textarea name="body" type="text" class="form-control" id="body" placeholder="Описание"></textarea>
        </div>
        <button class="btn btn-danger">Создать</button>
    </form>
@endsection