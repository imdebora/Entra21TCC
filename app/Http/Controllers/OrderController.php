<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewOrderEmail;
use App\Service\OrderSave\NewItemCreator;
use App\Service\OrderSave\NewOrderCreator;
use App\Service\OrderSave\NewUserBalance;
use App\Service\StockController\NewItemStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function storeOrder(Request $request, NewItemCreator $newItemCreator, NewOrderCreator $newOrderCreator,NewItemStock $newItemStock, NewUserBalance $newUserBalance)
    {
        $productsInSession = $request->session()->get("products");

        if (Auth::user()->getBalance() > 0) {
        if ($productsInSession) {
            $userId = Auth::user()->getId();

            $order = $newOrderCreator->newOrderGenerator($userId);
            $total = $newItemCreator->newItemGenerator($productsInSession, $order);

            $order->setTotal($total);
            $order->save();

            $newUserBalance->newBalance($total);

            $request->session()->forget('products');
            $viewData = [];
            $viewData["order"] = $order;
            $total = $order->getTotal();
            $userName = $order->getUser()->name;

            SendNewOrderEmail::dispatch($userName, $total);

            return view('products.carShopping.order')->with("viewData", $viewData);
        }
        }
            return redirect()->route('carShopping')->withErrors('Saldo Insuficiente');
    }

}
