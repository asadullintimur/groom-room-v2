<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view("index.index", ["orders" => Order::homeOrders()]);
    }
}
