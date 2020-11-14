<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertOrderRequest;
use App\Models\Order;
use Response;

class AdminOrderController extends Controller
{
    public function index()
    {
        return Response::view('admin.order.index', [
            'orders' => Order::query()->paginate(10),
        ]);
    }

    public function edit($id)
    {
        $order = Order::query()->findOrFail($id);
        return Response::view('admin.order.edit',[
            'order' => $order,
        ]);
    }

    public function update(UpsertOrderRequest $request, $id)
    {
        $order = Order::query()->findOrFail($id);
        $order->update($request->except('_token'));
        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return Response::json( [
            'status' => true,
        ]);
    }
}
