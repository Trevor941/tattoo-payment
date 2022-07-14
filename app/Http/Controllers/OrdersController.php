<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(15);
        $order_items = OrderItem::all();
        return view('orders.index', compact('orders','order_items'));
    }
    public function singleorder($id)
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(15);
        $singleorder = Order::findOrFail($id);
        $order_items = OrderItem::all();
        return view('orders.index', compact('orders', 'singleorder', 'order_items'));
    }
}
