<?php
/**
 * Created by PhpStorm.
 * User: ubuntu-gnome
 * Date: 10/18/14
 * Time: 3:37 AM
 */

class Place extends Eloquent {

    protected $table = 'places';

	public function validate() {
		$validator = Validator::make(
			array(
				'title'       => $this->title,
				'description' => $this->description,
				'category'    => $this->category,
				'lat'         => $this->lat,
				'lon'         => $this->lon
			),
			array(
				'title'       => 'required|unique:places',
				'description' => '',
				'category'    => 'required|exists:places_categories,id',
				'lat'         => 'required|numeric',
				'lon'         => 'required|numeric'
			)
		);
		return $validator;
	}

} 