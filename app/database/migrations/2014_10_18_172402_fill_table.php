<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Comment::insert(array(
            array('module_id' => 1, 'instance_id'=>1, 'user_id'=>1, 'pid' => 0, 'comment'=>'бла-бла, я коммент'),
            array('module_id' => 1, 'instance_id'=>1, 'user_id'=>1, 'pid' => 1, 'comment'=>'бла-бла, я коммент'),
            array('module_id' => 1, 'instance_id'=>1, 'user_id'=>1, 'pid' => 2, 'comment'=>'бла-бла, я коммент'),
            array('module_id' => 1, 'instance_id'=>1, 'user_id'=>1, 'pid' => 3, 'comment'=>'бла-бла, я коммент'),
            array('module_id' => 1, 'instance_id'=>1, 'user_id'=>1, 'pid' => 4, 'comment'=>'бла-бла, я коммент'),
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Comment::truncate();
	}

}
