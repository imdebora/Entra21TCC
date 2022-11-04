<?php

namespace App\Service\OrderSave;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;

class NewItemCreator
{
    public function newItemGenerator($productsInSession, Order $order)
    {

        $productsInCart = Product::findMany(array_keys($productsInSession));

        $total = 0;

        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()];
            $item = new Item();
            $item->setQuantity($quantity);
            $item->setPrice($product->getPrice());
            $item->setProductId($product->getId());
            $item->setOrderId($order->getId());
            $item->save();
            $total = $total + ($product->getPrice()*$quantity);
        }
            return $total;
    }
}
