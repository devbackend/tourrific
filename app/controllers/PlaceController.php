<?php
/**
 * Created by PhpStorm.
 * User: ubuntu-gnome
 * Date: 10/18/14
 * Time: 3:34 AM
 */

class PlaceController extends BaseController {

    public function showPlace($id) {
        $place = Place::find($id);
        return View::make('place\view', array('place'=>$place));
    }

	public function savePlace() {
		if(Input::get('id')==0) {
			$place = new Place;
		} else {
			$place = Place::find(Input::get('id'));
		}
		$place->title       = Input::get('title');
		$place->description = Input::get('description');
		$place->category    = Input::get('category');
		$place->lat         = Input::get('lat');
		$place->lon         = Input::get('lon');
		$validator          = $place->validate();
		if($validator->passes()) {
			$place->save();
			echo "Успешно сохранено, тут будет редирект";
		} else {
			Input::flash();
			return Redirect::to('/place/edit/'.Input::get('id'))->withErrors($validator);
		}
	}
}