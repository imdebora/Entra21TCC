<?php

namespace App\Service\AdminSearchEngine;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductsSearch implements SearchEngine
{
    public function search(Request $request)
    {
        $products = Product::query();

        $products->when($request->search, function ($query, $campoDePesquisa){
            $query->where('product_name', 'like', '%' . $campoDePesquisa . '%');
        });

        $products = $products->paginate(5);
            return $products;
    }

}
