<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
	</head>
	<body>
		<h2>Редактор места</h2>
		{{ Form::model($place, array('route'=>array('place.save', $place->id))) }}
		{{ Form::hidden('id',$place->id) }}
		{{ $errors->first('title'); }}
		{{ Form::label('title', 'Название места') }}
		{{ Form::text('title') }}<br>
		{{ $errors->first('category') }}
		{{ Form::label('category', 'Категория') }}
		{{ Form::select('category', array_merge(array(0=>'-- Выберите категорию --'),PlacesCategories::lists('title','id'))) }}<br>
		{{ Form::label('description', 'Описание') }}
		{{ Form::textarea('description') }}<br>
		{{ $errors->first('lat') }}
		{{ $errors->first('lon') }}
		{{ Form::hidden('lat') }}
		{{ Form::hidden('lon') }}
		<div id="ymaps" style="width: 600px; height: 400px"></div>
		{{ Form::submit() }}
		{{ Form::close(); }}

		<script>
        		// Как только будет загружен API и готов DOM, выполняем инициализацию
        		ymaps.ready(init);

        		function init () {
        			var myMap = new ymaps.Map("ymaps", {
        				<?php if($place->lat=='' || $place->lon==''): ?>
        				center: [45.448491,134.707780],
        				<?php else: ?>
        				center: [{{$place->lat}},{{$place->lon}}],
        				<?php endif; ?>
        				zoom: 7
        			}, {
        				balloonMaxWidth: 200
        			});

        			myMap.controls
        				// Кнопка изменения масштаба
        				.add('zoomControl')
        				// Список типов карты
        				.add('typeSelector')
        				// Стандартный набор кнопок
        				.add('mapTools');

        			<?php if($place->lat!='' && $place->lon!=''): ?>
        			coords = [{{$place->lat}},{{$place->lon}}];
        			myMap.balloon.open(coords, {
						contentHeader: 'Здесь!',
						contentFooter: '<span style="font-size:x-small; line-height:auto;">Ошиблись?<br/>Щёлкните в другом месте.</span>'
                                              				});
        			<?php endif; ?>

        			// Обработка события, возникающего при щелчке
        			// левой кнопкой мыши в любой точке карты.
        			// При возникновении такого события откроем балун.
        			myMap.events.add('click', function (e) {
        				myMap.balloon.close();
        				var coords = e.get('coordPosition');
        				myMap.balloon.open(coords, {
        					contentHeader: 'Здесь!',
        					contentFooter: '<span style="font-size:x-small; line-height:auto;">Ошиблись?<br/>Щёлкните в другом месте.</span>'
        				});

        				$('input[name=lat]').val(coords[0].toPrecision(6));
        				$('input[name=lon]').val(coords[1].toPrecision(6));
        			});
        		}
        	</script>
	</body>
</html>
