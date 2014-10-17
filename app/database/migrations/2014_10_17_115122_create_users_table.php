<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function ($table) {
            $table->increments('user_id');
            $table->string('login', 32)->unique();
            $table->string('pass', 64);
            $table->string('email', 255)->unique();
            $table->text('place');
            $table->text('place_want');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('users');
	}

}
