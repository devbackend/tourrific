<h2>{{$username}}</h2>

{{ Form::open(array('url' => 'profile/edit')) }}
    <?php

      echo Form::label('change_pass', 'Сменить пароль');
      echo Form::password('new_password');

      echo Form::label('first_name', 'Имя');
      echo Form::text('first_name', $firstname);

      echo Form::label('last_name', 'Фамилия');
      echo Form::text('last_name', $lastname);

      echo Form::label('about_me', 'Обо мне');
      echo Form::textarea('about_me', $about);

      echo Form::submit('Сохранить');

    ?>
{{ Form::close() }}