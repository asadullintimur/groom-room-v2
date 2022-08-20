<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.index", ["orders" => Order::all()]);
    }

    public function changeStatus(UpdateOrderStatusRequest $request, Order $order)
    {
        if ($order->isProcessed()) {
            return;
        }

        if ($request->new_status === "processed") {
            $order->after_image = $request->file("photo")->store("images", "public");
        }
        $order->status = $request->new_status;
        $order->save();

        return back();
    }
}
