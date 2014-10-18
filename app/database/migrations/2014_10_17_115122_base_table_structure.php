<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseTableStructure extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_groups', function ($table) {
			$table->increments('id');
			$table->string('name', 32)->unique();
			$table->string('title', 32);
			$table->string('title_plural', 32);
		});

        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('login', 32)->unique();
            $table->string('password', 64);
            $table->string('email', 255)->unique();
	        $table->integer('user_group')->unsigned()->default(3);
	        $table->string('first_name');
	        $table->string('last_name');
	        $table->text('about_me');
	        $table->float('rate');
            $table->timestamps();
	        $table->foreign('user_group')->references('id')->on('user_groups');
        });

		// Добавление таблицы
		Schema::create('places_categories', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->string('title_plural');
		});

		// Добавляем таблицу мест
		Schema::create('places', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->integer('category')->unsigned();
			$table->float('lat');
			$table->float('lon');
			$table->float('rate');
			$table->timestamps();
			$table->foreign('category')->references('id')->on('places_categories');
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

		UserGroup::insert(
			array(
				array('id' => 1, 'name'=>'administrator', 'title'=>'Администратор', 'title_plural'=>'Администраторы'),
				array('id' => 2, 'name'=>'moderator',     'title'=>'Модератор',     'title_plural'=>'Модераторы'),
				array('id' => 3, 'name'=>'user',          'title'=>'Пользователь',  'title_plural'=>'Пользователи'),
			)
		);

		Schema::create('user_places', function($table) {
			$table->integer('user_id')->unsigned();
			$table->integer('place_id')->unsigned();
			$table->boolean('was_here');
			$table->primary(array('user_id','place_id'));
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('place_id')->references('id')->on('places');
		});

		Schema::create('place_photos', function ($table) {
			$table->increments('id');
			$table->integer('place_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('media_data', 255);
			$table->integer('enable')->default(0);
			$table->float('rate');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('place_id')->references('id')->on('places');
		});


		//создание таблицы со списком моделей
		Schema::create('models', function($table){
			$table->increments('id');
			$table->string('model', 255);
			$table->timestamps();
		});

		Schema::create('rate', function($table){
			$table->increments('id');
			$table->integer('module_id')->unsigned();
			$table->integer('instance_id');
			$table->integer('user_id');
			$table->boolean('plus');
			$table->timestamps();
			$table->foreign('module_id')->references('id')->on('models');
		});

		//добавление таблицы комментариев
		Schema::create('comments', function($table){
			$table->increments('id');
			$table->integer('module_id')->unsigned();
			$table->integer('instance_id');
			$table->integer('user_id');
            $table->integer('pid')->default(0);
			$table->text('comment');
			$table->timestamps();
			$table->foreign('module_id')->references('id')->on('models');
		});

		//заполнение списка моделей
		Models::insert(
			array(
				array('id' => 1, 'model'=>'Place'),
				array('id' => 2, 'model'=>'PlacePhoto'),
				array('id' => 3, 'model'=>'Users'),
				array('id' => 4, 'model'=>'Blog'),
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
		Schema::drop('user_places');
		Schema::drop('rate');
		Schema::drop('place_photos');
		Schema::drop('comments');
		Schema::drop('models');
		Schema::drop('users');
		Schema::drop('user_groups');
		Schema::drop('places');
		Schema::drop('places_categories');
	}

}
