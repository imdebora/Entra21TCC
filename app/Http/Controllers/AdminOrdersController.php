<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Service\AdminSearchEngine\OrdersSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminOrdersController extends Controller
{
    public function ordersList(Request $request, OrdersSearch $ordersSearch)
    {   $users = User::all();
        $orders = $ordersSearch->search($request);
        return view('admin.management.orders.ordersList', compact('orders','users'));
    }

    public function destroyOrder(Order $order)
    {
        $order->delete();

        return Redirect::route('ordersList');
    }
}
