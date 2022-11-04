<?php

namespace App\Service\AdminSearchEngine;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersSearch implements SearchEngine
{

    public function search(Request $request)
    {
        $orders = Order::query();

        $orders->when($request->search, function ($query, $campoDePesquisa){
            $query->where('id', 'like', '%' . $campoDePesquisa . '%');
        });

        $orders = $orders->paginate(5);
        return $orders;
    }
}
