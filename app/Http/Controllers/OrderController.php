<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view("order.index", ["orders" => auth()->user()->orders]);
    }

    public function store(StoreOrderRequest $request) {
        $path = $request->file("photo")->store("images", "public");

        Order::create([
            "pet_name" => $request->pet_name,
            "before_image" => $path,
            "status" => "new",
            "user_id" => auth()->user()->id
        ]);

        return back();
    }

    public function delete(Order $order) {
        if ($order->isProcessed()) {
            return;
        }

        $order->delete();
        return back();
    }
}
