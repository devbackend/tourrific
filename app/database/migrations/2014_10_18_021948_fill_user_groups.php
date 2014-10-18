<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillUserGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        UserGroup::insert(
            array(
                array('id' => 1, 'name'=>'administrator', 'title'=>'Администратор', 'title_plural'=>'Администраторы'),
                array('id' => 2, 'name'=>'moderator',     'title'=>'Модератор',     'title_plural'=>'Модераторы'),
                array('id' => 3, 'name'=>'user',          'title'=>'Пользователь',  'title_plural'=>'Пользователи'),
            )
        );
	}

	public function down()
	{
		UserGroup::truncate();
	}

}
