<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = \DB::table('categories')->select('*')->get();

        return view('category', compact('categories'));
    }
}
