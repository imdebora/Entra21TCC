<?php

namespace App\Service\StockController;

use App\Models\Product;

class NewItemStock
{
    public function oldStockController(array $productsInSession)
    {
        $oldProductsStock = [];
        for ($i = 0; $i < count($productsInSession); $i++)
            $oldProductsStock[] = Product::find($productsInSession);

            return $oldProductsStock;
    }

    public function newStock(array $clientOrder)
    {
        $oldProductsStock = Product::all();

        $orderData[] = $clientOrder;

        foreach ($orderData as $data) {
            dd($data);

        }
        $newProductStock = $oldProductsStock - $productsQuantity;
        dd($newProductStock);
    }

}
