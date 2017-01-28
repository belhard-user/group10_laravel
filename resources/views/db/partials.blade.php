{{ Form::text('email', null, ['placeholder' => 'email']) }}<br>
{{ Form::text('name', null, ['placeholder' => 'name']) }}<br>
{{ Form::number('age', null, ['placeholder' => 'age']) }}<br>
{{ Form::input('hidden', 'user_role', rand(1, 5)) }}
{{ Form::submit($btnText, ['class' => 'btn']) }}