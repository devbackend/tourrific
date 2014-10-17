<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPlaces extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("ALTER TABLE `places` CHANGE COLUMN `description` `description` text NULL");
		Schema::table('places_categories', function($table) {
			$table->text('title_plural');
		});
		PlacesCategories::insert(
			array(
				array('name'=>'mountain', 'title'=>'Гора/хребет', 'title_plural'=>'Горы и хребты'),
				array('name'=>'park', 'title'=>'Парк', 'title_plural'=>'Парки'),
				array('name'=>'waterfall', 'title'=>'Водопад', 'title_plural'=>'Водопады'),
				array('name'=>'lakes', 'title'=>'Река/Озеро', 'title_plural'=>'Реки и озера'),
				array('name'=>'cave', 'title'=>'Пещера', 'title_plural'=>'Пещеры'),
				array('name'=>'archeology', 'title'=>'Археологическая раскопка', 'title_plural'=>'Археологические раскопки'),
				array('name'=>'lotus', 'title'=>'Лотосы', 'title_plural'=>'Лотосы'),
				array('name'=>'beach', 'title'=>'Пляж', 'title_plural'=>'Пляжи'),
				array('name'=>'recreation', 'title'=>'Заповедник', 'title_plural'=>'Заповедники'),
				array('name'=>'mineral_source', 'title'=>'Минеральный источник', 'title_plural'=>'Минеральные источники'),
				array('name'=>'activity', 'title'=>'Активный отдых', 'title_plural'=>'Активный отдых'),
				array('name'=>'base', 'title'=>'База отдыха', 'title_plural'=>'Базы отдыха')
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
