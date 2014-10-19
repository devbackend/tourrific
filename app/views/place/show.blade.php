<div class="wrapper">
	<div class="sidebar">
		<ul class="sidebar_menu">
			<li><a href="#place">Местоположение</a></li>
			<li><a href="#about">Описание</a></li>
			<li><a href="#photos">Фотографии</a></li>
			<li><a href="#comments">Отзывы</a></li>
		</ul>
	</div>
	<div class="main">
		<div class="raiting_star">{{$place->rating}}</div>
		<h1>{{$place->title}}</h1>
		<div class="place_column">
			<img src="" style="width:250px; height:250px;" alt=""/>
			asdf
		</div>
		<div class="place_column">
			<div class="rate">
				<p style="font-size:14px; color:#999999">Оцените место:</p>
				<a href=""><i class="vote_down"></i> Плохо</a>
				<a href=""><i class="vote_up"></i> Отлично!</a>
			</div>

			<a class="button blue" href="">Добавить фотографию <i class="add_photo"></i></a>
			<a class="button blue" href="">Добавить рассказ <i class="add_blog"></i></a>
			<a class="button blue" href="">Написать отзыв<i class="add_comment"></i></a>
		</div>
		<div class="place_column">
			<div class="was_here">
				<a href=""><i class="i_was_here"></i><span>Я тут был</span></a><br/><br>
				<a href=""><i class="i_wanna_go"></i><span>Я хочу тут побывать</span></a>
			</div>
		</div>
		<br clear="both"/>
		<h1>Местоположение</h1>
		<hr/>
		<div id="map" style="width: 100%; height: 400px"></div>

		<h1>Описание</h1>
		<hr/>
		<div>
			{{$place->description}}
		</div>

		<h1>Фотографии</h1>
		<hr/>
		<div>

		</div>

		<h1>Как добраться?</h1>
		<hr/>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias aliquid, consequuntur cum deleniti eaque earum exercitationem, facere harum incidunt inventore iusto minima minus mollitia nesciunt numquam odio omnis, perspiciatis porro quasi qui quidem recusandae repellat sunt suscipit temporibus vitae?</p>
           	<p>Ab blanditiis cupiditate distinctio doloremque incidunt non officia, quia quisquam quos tempore. Accusantium amet deserunt dignissimos dolorem eveniet, labore, libero optio porro repellat soluta vel voluptatibus. Aspernatur assumenda aut distinctio doloremque doloribus error explicabo molestiae odit perspiciatis quis quisquam, repellat tempora, tempore.</p>
           	<p>Aliquam, aliquid animi consequatur debitis iure neque nostrum numquam porro provident quis sit sunt temporibus tenetur totam, voluptatem! Asperiores, autem consectetur eum fugiat fugit hic repellendus soluta vitae? Amet cum hic magnam natus, nulla praesentium suscipit tempora ullam unde ut. Deserunt dolorum eaque et inventore libero minus necessitatibus, provident rem reprehenderit tempore. Ab accusantium commodi consequuntur corporis debitis deleniti dignissimos distinctio doloremque dolores dolorum est eum ex illo illum impedit in iste laudantium libero minus necessitatibus nisi officia perferendis quibusdam, quisquam quos sed similique sit suscipit tempora tempore ullam unde velit veniam veritatis vero voluptatem voluptatibus! Adipisci aliquid amet animi assumenda beatae consequuntur delectus dicta dignissimos distinctio ducimus facilis ipsa iusto laudantium maxime minus nam natus necessitatibus neque, nesciunt nihil nostrum nulla officia porro possimus provident quae quaerat qui reprehenderit sequi tenetur veniam vero vitae voluptatum. Alias at praesentium repellendus soluta voluptate!</p>
           	<p>Assumenda consectetur consequuntur, excepturi necessitatibus nisi obcaecati porro sapiente sequi voluptatem voluptates. A aperiam aut fuga id maiores quos reprehenderit sapiente! Animi culpa cupiditate dolorem in labore magnam nobis ratione, voluptates. Cumque cupiditate debitis delectus dignissimos dolorem ea est et eveniet ex hic ipsa ipsum laudantium magni modi odio, quam quas quia quos ratione reiciendis rem reprehenderit saepe sed, tempora totam. Blanditiis delectus distinctio dolore dolorem, enim eos inventore porro quo sint.</p>
		</div>
		<h1>Отзывы</h1>
		<hr/>
		<div>

		</div>
		<script type="text/javascript">
			ymaps.ready(init);
			var myMap;

			icons = [
				[[0,0], [31,41]], // Горы
				[[33,42], [64,83]], // Парки
				[[0,129],[31,170]], // Водопады
				[[33,0], [64,41]], // Реки и Озёра
				[[33,129],[64,170]], // Пещеры
				[[66,85], [97,126]], // Археологические раскопки
				[[66,129],[97,170]], // Лотосы
				[[33,85], [64,126]], // Пляжи
				[[0,85], [31,126]], // Заповедники
				[[66,42], [97,83]], // Минеральные источники
				[[0,42], [31,83]], // Активный отдых
				[[66,0], [97,41]] // Базы отдыха
			];

			function init(){
				myMap = new ymaps.Map("map", {
					center: [{{$place->lat}}, {{$place->lon}}],
					zoom: 7
				});
				myPlacemark = new ymaps.Placemark([{{$place->lat}}, {{$place->lon}}], { content: '{{$place->title}}' }, {
					 // Своё изображение иконки метки.
					 iconImageHref: '/images/icons_sprite_big.png',
					 iconImageClipRect: icons[{{$place->category-1}}],
					 iconImageSize: [31, 41],
					 iconImageOffset: [-15, -41]
                 });
				myMap.geoObjects.add(myPlacemark);
			}
		</script>
	</div>
</div>

