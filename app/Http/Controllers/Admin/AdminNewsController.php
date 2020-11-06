<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class AdminNewsController extends Controller
{
    public function index()
    {
        return Response::view('admin.news.index', [
            'news'       => $this->news,
            'categories' => $this->categories,
        ]);
    }

}
