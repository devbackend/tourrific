{{ Form::open(array('url' => '/comment/send')) }}

{{ Form::label('comment', 'Текст комментария') }}
{{ Form::textarea('comment') }}

{{ Form::hidden('module_id',   $module_id) }}
{{ Form::hidden('instance_id', $instance_id) }}

{{ Form::submit('Upload') }}

{{ Form::close() }}
