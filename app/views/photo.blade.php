{{ Form::open(array('url' => 'photo', 'files' => true)) }}
    <?php
      echo Form::label('photo', 'Фоточка');
      echo Form::file('photo');

      echo Form::hidden('place_id', );

      echo Form::submit('Upload');

    ?>
{{ Form::close() }}