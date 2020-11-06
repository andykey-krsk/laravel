<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Storage;

class FeedbackController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('feedback');
    }

    public function store(Request $request): \Illuminate\Http\Response
    {
        $requestData = $request->except(['_token']);

        $file = [];

        if (Storage::exists('feedback.json')) {
            $file = json_decode(Storage::get('feedback.json'), true);
        }
        $file[] = $requestData;

        Storage::put('feedback.json', json_encode($file));

        return Response::view('feedback', ['status' => true]);
    }
}
