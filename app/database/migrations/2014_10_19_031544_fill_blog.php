<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillBlog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Blog::insert(array(
            array('place_id' => 1, 'user_id' => 1, 'title' => 'Lorem ipsum', 'preview' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus.', 'full' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus', 'rate' => '4.75'),
            array('place_id' => 1, 'user_id' => 1, 'title' => 'Lorem ipsum', 'preview' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus.', 'full' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus', 'rate' => '4.75'),
            array('place_id' => 1, 'user_id' => 1, 'title' => 'Lorem ipsum', 'preview' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus.', 'full' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus', 'rate' => '4.75'),
            array('place_id' => 1, 'user_id' => 1, 'title' => 'Lorem ipsum', 'preview' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus.', 'full' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus', 'rate' => '4.75'),
            array('place_id' => 1, 'user_id' => 1, 'title' => 'Lorem ipsum', 'preview' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus.', 'full' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus dolor nec risus ornare, quis gravida odio lobortis. Suspendisse sed malesuada nibh. Pellentesque metus ligula, facilisis ac tincidunt nec, volutpat pellentesque quam. Fusce pellentesque erat quis arcu ultrices ornare. Pellentesque sagittis urna arcu, non feugiat massa iaculis non. Proin pharetra suscipit urna, vitae tincidunt magna aliquet vel. Donec mi purus, aliquet ac blandit et, maximus sed tellus', 'rate' => '4.75'),
        ));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Blog::truncate();
	}

}
