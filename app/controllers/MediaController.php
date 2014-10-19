<?php
/**
 * Created by PhpStorm.
 * User: tsbgroup
 * Date: 18.10.14
 * Time: 13:54
 */

class MediaController extends BaseController {

    public function getPhoto($placeId)
    {
        return View::make('photo', array('place_id' => $placeId));
    }

    public function postPhoto()
    {
        if(!Auth::check())
            return 'Добавлять фотографии могут только зарегистрированные пользователи';

        $file = Input::file('photo');
        $placeId = Input::get('place_id');
        $filename = md5('photo_'.$placeId.'_'.time().Auth::user()->id).'.'.$file->getClientOriginalExtension();

        $file->move(public_path().'/upload/photo/', $filename);

        $placeMedia = new PlaceMedia();

        $placeMedia->media_id = 1;
        $placeMedia->place_id = $placeId;
        $placeMedia->user_id = Auth::user()->id;
        $placeMedia->media_data = $filename;

        $placeMedia->save();
    }

    public function videoLoad()
    {
        $video   = Input::get('youtube_link');
        $placeId = Input::get('place_id');

        $placeMedia = new PlaceMedia();

        $placeMedia->media_id = 2;
        $placeMedia->place_id = $placeId;
        $placeMedia->user_id = Auth::user()->id;
        $placeMedia->media_data = $video;

        $placeMedia->save();
    }

} 