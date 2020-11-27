<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use App\Http\Requests\ParserRequest;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\Source;
use Response;

class AdminParserController extends Controller
{
    public function index()
    {
        return Response::view('admin.parser.index', [
            'sources' => Source::query()->paginate(10),
            'categories' => Category::all(),
        ]);
    }

    public function parse(ParserRequest $request)
    {
        $sources = Source::query()
            ->whereIn('id', $request->input('sources'))
            ->get();

        $categories = $request->input('categories');

        foreach ($categories as $key => $category) {
            if ($category == 0) {
                unset($categories[$key]);
            }
        }

        $category_rand = false;
        $categories = array_values($categories);
        if (empty($categories)) {
            $categories = array_column(Category::query()->select('id')->get()->toArray(), 'id');
            $category_rand = true;
        }

        foreach ($sources as $key => $source) {
            if ($category_rand) {
                $category = $categories[array_rand($categories)];
            } else {
                $category = $categories[$key];
            }

            NewsParsing::dispatch($source, $category);
        }

        return redirect()->route('parser')->with('success', 'Парсинг запущен');
    }
}
