<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Service\QuantityValidation;
use App\Service\TransationMessage;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function carShopping(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $quantidade = $productsInSession;
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;

        return view('products.carShopping.carShopping', compact('quantidade'))->with("viewData", $viewData);
    }

    public function addToCart(CartRequest $request, $id, QuantityValidation $quantityValidation, TransationMessage $transationMessage)
    {
        //A lógica aplicada foi a seguinte, eu faço a validação da request da inserção do produto no carrinho, depois usando um metodo de uma classe verifico se a quantidade escolhida pelo cliente não é maior do que o que temos em estoque, e baseado nessa mensagem, usando outro metodo, eu retorno uma mensagem de sucesso ou falha, caso a operacao se suceda, o processo continua normalmente, caso fracasse, o cliente é redirecionado de volta.

        $request->validated();
        $sucessOrFail = $quantityValidation->quantityValidator($request->quantity,$id);
        $productStockReduction = Product::find($id);
        $newStock = round($productStockReduction->stock) - $request->quantity;

        $transationMessage->productInsertedCart($request, $sucessOrFail);

        if ($sucessOrFail) {

            $products = $request->session()->get("products");
            $products[$id] = $request->input('quantity');
            $request->session()->put('products', $products);
            $productStockReduction->setStock($newStock);
            $productStockReduction->save();
            $request->session()->put('productsNew', $products);
            return redirect()->route('carShopping');

        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $oldProducts = $request->session()->get('products');

        foreach ($oldProducts as $id => $stock) {
           $findProduct = Product::find($id);
           $newStock = $findProduct->stock + $stock;
           $findProduct->setStock($newStock);
           $findProduct->save();
        }

        $request->session()->forget('products');
        $request->session()->forget('productsNew');

        return redirect()->route('productsList');

    }
}
