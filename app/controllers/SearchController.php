<?php

class SearchController {

    public function exec()
    {
        $searchQuery = Input::get('search_query');
        $searchResult = array(

            'blogResult'       => Blog::whereRaw('title like %?% || preview like %?% || full like %?%', array($searchQuery, $searchQuery))->get()->toArray(),
            'placeResult'      => Blog::whereRaw('title like %?% || description like %?%', array($searchQuery, $searchQuery))->get()->toArray(),
            'CategoriesResult' => Blog::whereRaw('title like %?%', array($searchQuery))->get()->toArray()

        );

        return View::make('search.result', array('result_list', $searchResult));
    }

} 