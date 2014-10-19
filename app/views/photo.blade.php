{{ Form::open(array('url' => 'photo', 'files' => true)) }}

{{ Form::label('photo', 'Фоточка') }}
{{ Form::file('photo') }}

{{ Form::hidden('place_id', $place_id) }}
{{ Form::submit('Upload') }}

{{ Form::close() }}