<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index():View
    {
        $order = $this->getUserOrder();
        $items = $order->getItems;
        $user_order = $this->getUserOrder();

        return view('cart.index', compact('items','order','user_order'));
    }

    public function getUserOrder()
    {
        $order = Order::where('status',0)->count();

        if($order == 0){
            $order = Order::create(['user_id' => Auth::id()]);
        } else {
            $order = Order::where('status',0)->first();
        }

        return $order;
    }
}
