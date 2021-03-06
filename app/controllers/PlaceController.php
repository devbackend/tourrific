<?php
/**
 * Created by PhpStorm.
 * User: ubuntu-gnome
 * Date: 10/18/14
 * Time: 3:34 AM
 */

class PlaceController extends BaseController {

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
			return Redirect::to('/place/'.$place->id);
		} else {
			Input::flash();
			return Redirect::to('/place/edit/'.Input::get('id'))->withErrors($validator);
		}
	}

	public function showPlace($place) {
		$category = PlacesCategories::find($place->category);
		return View::make('template', array('title'=>$place->title))->nest('content', 'place/show', array('place'=>$place, 'category'=>$category));
	}

    public function generateYoutubeFrame($link)
    {
        $youtube_pcre = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        if(!preg_match($youtube_pcre, $link, $match))
            return '';

        return $match[1];
    }
}