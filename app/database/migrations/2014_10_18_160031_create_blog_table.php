<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function($table){

            $table->increments('id');
            $table->integer('place_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('title', 32);
            $table->text('preview');
            $table->text('full');
            $table->float('rate');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');

        });
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
