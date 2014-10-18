<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserId2id extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Изменяем поле user_id на id в таблице users
        Schema::table('users', function($table) {
            $table->renameColumn('user_id', 'id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        // отмена переименования поля
        Schema::table('users', function($table) {
            $table->renameColumn('id', 'user_id');
        });
	}

}
