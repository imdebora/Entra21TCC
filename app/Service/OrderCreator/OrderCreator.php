<?php

namespace App\Service\OrderCreator;

use App\Models\Product;

class OrderCreator
{
    public function newOrderArray(int $itemsQuantity, array $items, int $id) : array
    {
        $orderData = [];
        for ($i = 0; $i < $itemsQuantity; $i++) {
            if ($items[$i]['order_id'] == $id) {
                $orderData[] =
                    [
                        'product_id' => $items[$i]['product_id'],
                        'quantity' => $items[$i]['quantity'],
                        'price' => $items[$i]['price']];
            }
        }
        return $orderData;
    }

    public function newProductArray(array $orderData) : array
    {
        $products = Product::all();

        for ($i = 0; $i < count($orderData); $i++) {

            $idProduct = $orderData[$i]['product_id'];
            $productName =  $products->find($idProduct);

            $productInfo[] = [
                'product_name' => $productName['product_name'],
                'quantity' => $orderData[$i]['quantity'],
                'price' => $orderData[$i]['price']];
        }
        return $productInfo;
    }
}
