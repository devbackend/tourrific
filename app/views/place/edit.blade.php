<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Редактор места</h2>
		{{ Form::model($place, array('route'=>array('place.save', $place->id))) }}
		{{ Form::hidden('id',0) }}
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
		{{ Form::text('lat') }}
		{{ Form::text('lon') }}
		{{ Form::submit() }}
		{{ Form::close(); }}


	</body>
</html>
