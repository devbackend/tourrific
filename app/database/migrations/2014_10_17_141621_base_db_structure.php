<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseDbStructure extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Изменяем таблицу юзеров
		Schema::table('users', function($table) {
            $table->dropColumn('place');
            $table->dropColumn('place_want');
            $table->string('first_name')->after('updated_at');
            $table->string('last_name')->after('first_name');
            $table->text('about_me')->after('last_name');
        });

        // Добавляем таблицу мест
        Schema::create('places', function($table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->decimal('category');
            $table->float('lat');
            $table->float('lon');
            $table->timestamps();
        });

        // Добавление таблицы
        Schema::create('places_categories', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
        });

        // Рейтинг мест
        Schema::create('places_votes', function($table) {
            $table->decimal('user_id');
            $table->decimal('place_id');
            $table->decimal('vote');
            $table->primary(array('user_id','place_id'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        // Изменяем таблицу юзеров
        Schema::table('users', function($table) {
            $table->text('place');
            $table->text('place_want');
            $table->dropColumn('first_name');
            $table->dropColumn('second_name');
            $table->dropColumn('about_me');
        });

        // Добавляем таблицу мест
        Schema::drop('places');

        // Добавление таблицы
        Schema::drop('places_categories');

        // Рейтинг мест
        Schema::drop('places_votes');
	}

}
