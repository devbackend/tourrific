<?php
/**
 * Created by PhpStorm.
 * User: tsbgroup
 * Date: 18.10.14
 * Time: 13:54
 */

class PhotoController extends BaseController {

    public function photoLoad()
    {
        $file = Input::file('photo');
        $placeId = Input::get('place_id');
        $filename = md5('photo_'.$placeId.'_'.time().Auth::user()->id).'.'.$file->getClientOriginalExtension();

        $file->move(public_path().'/upload/photo/', $filename);

        $placePhoto = new PlacePhotos();

        $placePhoto->place_id = $placeId;
        $placePhoto->user_id = Auth::user()->id;
        $placePhoto->name = $filename;

        $placePhoto->save();
    }

} 