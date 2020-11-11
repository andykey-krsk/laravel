<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class AdminNewsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.news.index', [
            'news' => News::query()->paginate(5),
            'categories' => Category::all()->keyBy('id'),
            'sources' => Source::all()->keyBy('id'),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Response::view('admin.news.create', [
            'categories' => Category::all(),
            'sources' => Source::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        News::query()->create($request->except(['_token']));
        return redirect()->route('news.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::query()->findOrFail($id);
        return Response::view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all(),
            'sources' => Source::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $news = News::query()->findOrFail($id);
        $news->update($request->except(['_token']));
        return redirect()->route('news.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        News::destroy($id);

        return Response::json([
            'status' => true,
        ]);
    }
}
