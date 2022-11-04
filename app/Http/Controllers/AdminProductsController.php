<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Service\AdminSearchEngine\ProductsSearch;
use App\Service\TransationMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    public function list(Request $request, ProductsSearch $productsSearch)
    {
        $products = $productsSearch->search($request);

        $categories = Category::all();

        $message = $request->session()->get('message');
        $request->session()->remove('message');
        return view('admin.management.products.productsList', compact('message', 'products','categories'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.management.products.addProduct', compact('categories'));
    }

    public function storeProduct(ProductsStoreRequest $request, TransationMessage $transationMessage)
    {
        $newProduct = $request->validated();

        $newProduct['slug'] = Str::slug($newProduct['product_name']);
        $newProduct['category_id'] = $request->category;
        Product::create($newProduct);

        $transationMessage->returnAddProductMessage($request, $newProduct);

        return Redirect::route('list');
    }
    public function editProduct(Product $product, Category $categories)
    {
        $categories = Category::all();
        return view('admin.management.products.productEdit', compact('categories'), ['product' => $product]);
    }

    public function updateProduct(Product $product, ProductsStoreRequest $productsStoreRequest)
    {
        $newProduct = $productsStoreRequest->validated();
        $newProduct['slug'] = Str::slug($newProduct['product_name']);

        $product->fill($newProduct);
        $product->saveOrFail();

        return Redirect::route('list');
    }

    public function destroy(Product $product, Request $request, TransationMessage $transationMessage)
    {
        $productNome = $product->product_name;
        $product->delete();
        Storage::delete($product->image ?? '');

        $transationMessage->returnDestroyProductMessage($request,$productNome);

        return Redirect::route('list');
    }

    public function destroyImage(Product $product)
    {
        Storage::delete($product->image ?? '');
        $product->image = null;
        $product->save();
        return Redirect::back();
    }
}
