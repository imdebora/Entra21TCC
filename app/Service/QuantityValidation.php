<?php

namespace App\Service;

use App\Models\Product;

class QuantityValidation
{
    public function quantityValidator(int $quantity, int $productId)
    {
        $product = Product::find($productId);
        $productStock = $product->getStock();

           if ($quantity > $productStock) {
               return false;
           }

           return true;
    }
}
