<!--Template YandexMap-->

<html>
<head>

</head>
<body>
    {{ Form::open(array('url' => 'sign')) }}
    <?
      echo Form::label('user_login', 'Логин:');
      echo Form::text('user_login');

      echo Form::label('user_pass', 'Пароль');
      echo Form::text('user_pass');

      echo Form::label('user_email', 'Адрес e-mail');
      echo Form::text('user_email');

      echo Form::submit('Sign in');

    ?>
    {{ Form::close() }}
</body>
</html>