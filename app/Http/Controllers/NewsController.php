<?php

namespace App\Http\Controllers;

use DB;

class NewsController extends Controller
{
    public function allByCategory($categoryId)
    {
        $news = DB::table('news')
            ->join('categories', 'categories.id','=','news.category_id')
            ->where('news.category_id','=',$categoryId)
            ->get([
               'news.*',
               'categories.name AS category_name'
            ]);

        if (!count($news)) {
            return  redirect('/');
        }

        return view('category-news', compact('news'));
    }

    public function newsAll()
    {
        $news = DB::table('news')->select('*')->get();

        return view('news-all', compact('news'));
    }

    public function newsOne($id)
    {
        $news = DB::table('news')->where('id','=',$id)->get();

        if (!count($news)) {
            return  redirect('category');
        }
        return view('news', compact('news'));
    }
}
