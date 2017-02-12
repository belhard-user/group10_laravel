<div class="form-group">
    {{ Form::label('title', 'Название') }}
    {{ Form::text('title', null, ['placeholder' => 'Название', 'class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('short_description', 'Короткое описание') }}
    {{ Form::textarea('short_description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'Описание') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('images', 'Картинки') }}
    {{ Form::file('images[]', ['class' => 'form-control', 'multiple']) }}
</div>

<div class="form-group">
    {{ Form::label('tag_list', 'Категории') }}
    {{ Form::select('tag_list[]', \App\Tag::getTagList(), null, ['class' => 'form-control', 'multiple']) }}
</div>

{{ Form::submit($btnText, ['class' => 'btn btn-primary']) }}