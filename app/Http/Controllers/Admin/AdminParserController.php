<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XmlParser;

class AdminParserController extends Controller
{
    public const RSS = 'https://news.yandex.ru/army.rss';

    public function index()
    {
        $xmlParser = XmlParser::load(self::RSS);

        $parserData = $xmlParser->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]'],
        ]);
    }
}
