<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function allByCategory($categoryId)
    {
        if (empty($this->categories[$categoryId])) {
            return  redirect('category');
        }

        $category = $this->categories[$categoryId];

        $news = array_filter($this->news, function ($item) use ($categoryId) {
            return $item['categoryId'] == $categoryId;
        });

        return view('category-news', compact('news', 'category'));
    }

    public function newsAll()
    {
        if (empty($this->news)) {
            return  redirect('/');
        }

        $news = $this->news;

        return view('news-all', compact('news'));
    }

    public function newsOne($id)
    {
        if (empty($this->news[$id])) {
            return  redirect('category');
        }

        $news = $this->news[$id];

        return view('news', compact('news'));
    }
}
