<html>
	<head>

	</head>
	<body>
		<h2>{{$user->login}}</h2>
		{{$user->description}}

		<div id="myMap"></div>

		<script>
			ymaps.ready(init);
			var myMap;

			function init(){
				myMap = new ymaps.Map("map", {
					center: [1, 1],
					zoom: 7
				});

			}
		</script>
	</body>
</html>