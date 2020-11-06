<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use Storage;

class OrderController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('order');
    }

    public function store(Request $request): \Illuminate\Http\Response
    {
        $requestData = $request->except(['_token']);

        $file = [];

        if (Storage::exists('order.json')) {
            $file = json_decode(Storage::get('order.json'), true);
        }
        $file[] = $requestData;

        Storage::put('order.json', json_encode($file));

        return Response::view('order', ['status' => true]);
    }
}
