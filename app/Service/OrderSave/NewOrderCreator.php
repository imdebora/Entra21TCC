<?php

namespace App\Service\OrderSave;

use App\Models\Order;

class NewOrderCreator
{
    public function newOrderGenerator($userId)
    {
        $order = new Order();
        $order->setUserId($userId);
        $order->setTotal(0);
        $order->save();

        return $order;
    }
}
