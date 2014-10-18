<?php


class BlogController extends BaseController
{
    public function postSave()
    {
        $blogModel = new Blog();

        $blogModel->place_id = Input::get('place_id');
        $blogModel->user_id  = Input::get('user_id');
        $blogModel->title    = Input::get('title');
        $blogModel->preview  = Input::get('priview');
        $blogModel->full     = Input::get('full');

        $blogModel->save();

        return Redirect::to('/place/'.Input::get('place_id'));
    }

    public function getList($placeId)
    {
        $blogList = Blog::where('place_id', '=', $placeId)->orderBy('rate', 'desc')->find(5);

        return View::make('blog.list', array($blogList));
    }

} 