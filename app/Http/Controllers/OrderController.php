<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        Order::query()->create($request->except('_token'));
        return Response::view('order', ['status' => true]);
    }
}
