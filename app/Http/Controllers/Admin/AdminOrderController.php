<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
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

    public function update(Request $request, $id)
    {
        $order = Order::query()->findOrFail($id);
        $order->update($request->except('_token'));
        return redirect()->route('order.index');
    }

}
