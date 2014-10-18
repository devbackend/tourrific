<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RnPhotos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::rename('place_photos', 'place_media');

        Schema::create('media_types', function($table){
            $table->increments('id');
            $table->string('media', 255);
            $table->string('media_plural', 255);
            $table->timestamps();
        });

        Schema::table('place_media', function($table){
            $table->integer('media_id')->after('id')->unsigned();
            $table->foreign('media_id')->references('id')->on('media_types');
        });

        MediaTypes::insert(
            array(
                array('id' => 1, 'media'=>'фотография', 'media_plural'=>'фотографии'),
                array('id' => 2, 'media'=>'видео', 'media_plural'=>'видео'),
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
        Schema::rename('place_media', 'place_photos');
        Schema::drop('media_types');
        Schema::table('place_media', function($table)
        {
            $table->dropForeign('media_id');
            $table->dropColumn('media_id');
        });

	}

}
