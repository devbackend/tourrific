<!--Template YandexMap-->

<html>
<head>
<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    var myMap;

    function init(){
        myMap = new ymaps.Map("map", {
            center: [43.181846, 132.004696],
            zoom: 11
        });
    }

    var myPlacemark = new ymaps.Placemark([43.181846, 132.004696]);
</script>
</head>
<body>
    <div id="map" style="width: 600px; height: 400px"></div>
</body>
</html>