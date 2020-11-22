<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use App\Http\Requests\ParserRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Response;
use XmlParser;

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

            $xmlData = XmlParser::load($source->url);

            $parsedData = $xmlData->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'image' => ['uses' => 'channel.image.url'],
                'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
            ]);

            $newsInSystem = News::query()
                ->whereIn('source_guid', array_column($parsedData['news'], 'guid'))
                ->where('source_id', $source->id)
                ->get()
                ->keyBy('source_guid')
                ->toArray();

            $forInsert = [];

            foreach ($parsedData['news'] as $news) {
                if (!array_key_exists($news['guid'], $newsInSystem)) {
                    $forInsert[] = [
                        'title' => $news['title'],
                        'short_text' => $news['description'],
                        'full_text' => $news['description'],
                        'category_id' => $category,
                        'source_guid' => $news['guid'],
                        'source_id' => $source->id,
                        'link' => $news['link'],
                    ];
                }
            }
            News::query()->insert($forInsert);
        }

        return redirect()->route('parser')->with('success', 'Парсинг прошел успешно');
    }
}
