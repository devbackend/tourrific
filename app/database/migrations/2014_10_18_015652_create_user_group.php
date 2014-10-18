<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // добавляем поле user_group в таблицу users
        Schema::table('users', function($table) {
            $table->integer('user_group');
        });

        Schema::create('user_groups', function ($table) {
            $table->increments('id');
            $table->string('name', 32)->unique();
            $table->string('title', 32);
            $table->string('title_plural', 32);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('user_groups');
	}

}
