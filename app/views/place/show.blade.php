<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
</head>
<body>
	<h2>{{$place->title}}</h2>
	{{$category->title}}<br>
	<h3>Описание:</h3>
	{{$place->description}}<br>
	<div id="map" style="width: 600px; height: 400px"></div>
	<script type="text/javascript">
		ymaps.ready(init);
        var myMap;

        function init(){
            myMap = new ymaps.Map("map", {
                center: [{{$place->lat}}, {{$place->lon}}],
                zoom: 7
            });
            myPlacemark = new ymaps.Placemark([{{$place->lat}}, {{$place->lon}}], { content: '{{$place->title}}' });
            myMap.geoObjects.add(myPlacemark);
        }
    </script>



</body>
</html>
