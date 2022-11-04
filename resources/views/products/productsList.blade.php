@extends('layouts.layout')
@push('style')
    <link rel="stylesheet" href="{{asset('css/products/productslist.css')}}">
@endpush
<main>
<section class="wrapper">
    <body class="bg-black">
    <div class="container">
        <div class="element">
        <div class="col-lg-7">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-center text-lg-start text-white">Confira Nossos Pratos</h5>
            <form method="GET" action="{{route('productsList')}}" autocomplete="off">
                <section class="flex justify-center">
                    <label for="search" class="leading-7 text-sm text-gray-600 ml-2"></label>
                    <input type="text" id="search" name="search" class="placeholder:text-center w-2/4 mx-2.5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-indigo-200 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="Pesquisar Produto">
                    <button type="submit" class="inline-flex rounded border border-gray-300  py-1 px-3 focus:outline-none rounded">Pesquisar</button>
                </section>
            </form>
        </div>
        <div class="row g-1">
            @foreach($products as $product)
                <div class="col-md-3">
                    <a href="{{route('showProduct',$product->id)}}">
                        <div class="card p-3">

                            <div class="text-center">
                                <img class="img-thumbnail lista-de-produtos" src="{{asset($product->image)}}" width="200" alt="{{$product->product_name}}">
                            </div>

                            <div class="product-details">

                                <span class="text-center d-block text-product">{{$product->product_name}}</span>
                                <span class="font-weight-bold text-center d-block text-product">R$ {{$product->price}}</span>

                                <div class="weight mt-2 text-center d-block text-product">
                                    <small>{{round($product->stock)}} Unidades em estoque</small>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</body>
</section>
</main>
{{ $products->links() }}
