<?php

class CommentController extends BaseController {

    public function addComment()
    {
        $comment = new Comment();

        $comment->module_id   = Input::get('module_id');
        $comment->instance_id = Input::get('instance_id');
        $comment->user_id     = Auth::user()->id;
        $comment->comment     = Input::get('comment');

        $comment->save();

        return Redirect::back();
    }

    public function commentlist($model_id, $instance_id)
    {
        return Comment::whereRaw('module_id = ? && instance_id = ?', array($model_id, $instance_id))
            ->orderBy('created_at', 'asc')
            ->take(20)
            ->get()
            ->toJson();
    }

} 