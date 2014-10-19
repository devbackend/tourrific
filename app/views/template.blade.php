<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>{{$title}} - Tourrific</title>

	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

	{{HTML::style('css/reset.css')}}
	{{HTML::style('css/style.css')}}
</head>
<body>
	<div class="main_container">
		<div class="header">
			<div class="header_line"></div>
			<div class="wrapper">
				<div class="header_image">
					<span class="motto">Портал о местах и путешествиях<br>в Приморском крае и не только...</span>
					<div class="login_form">
						<?php if(Auth::check()): ?>
							{{Auth::user()->title}}
						<?php else: ?>
							{{Form::open(array('url'=>'/login'))}}
							<p class="title">Личный кабинет</p>
							{{Form::text('login')}}
							<a href="{{URL::to('/sign')}}">Регистрация</a>
							{{Form::password('password')}}
							<a href="{{URL::to('/password_forgot')}}">Забыли пароль?</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="header_menu">
			<div class="wrapper">
				<ul>
					<li><a href="{{URL::to('/')}}">Главная</a></li>
					<li><a href="{{URL::to('/places')}}">Места отдыха</a></li>
					<li><a href="{{URL::to('/users')}}">Пользователи</a></li>
					<li><a href="{{URL::to('/blogs')}}">Блоги</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			{{$content}}
		</div>
	</div>
	<div class="footer">
		<div class="wrapper">
			<span class="copyright">&copy 2014 Команда разработичков "Tourrific"</span>
		</div>
	</div>
</body>
</html>