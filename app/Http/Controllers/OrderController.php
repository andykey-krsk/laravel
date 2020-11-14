<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertOrderRequest;
use App\Models\Order;

use Response;

class OrderController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return Response::view('order');
    }

    public function store(UpsertOrderRequest $request)
    {
        Order::query()->create($request->except('_token'));
        return Response::view('order', ['status' => true]);
    }
}
