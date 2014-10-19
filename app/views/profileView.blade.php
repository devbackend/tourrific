<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
	</head>
	<body>
		<h2>{{$user->login}}</h2>
		{{$user->description}}

		<div id="map" style="width:600px; height:400px;"></div>

		<script>
			ymaps.ready(init);
			var myMap;
			var places={{$places->toJSON()}};

			function init(){
				myMap = new ymaps.Map("map", {
					center: [1, 1],
					zoom: 7
				});

				$(places).each(function(key, item) {
					myPlacemark = new ymaps.Placemark([item.lat, item.lon], { content: item.title });
                    myMap.geoObjects.add(myPlacemark);
				});

				myMap.setBounds(myMap.geoObjects.getBounds());
			}
		</script>
	</body>
</html>