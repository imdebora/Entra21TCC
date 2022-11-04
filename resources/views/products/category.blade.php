@extends('layouts.layout')
@push('style')
    <link rel="stylesheet" href="{{asset('css/products/productslist.css')}}">
@endpush
<section class="container my-3" id="category">
<body class="bg-black">
<div class="container-fluid bg-3 text-center h-75">
    <h3>Você Está Na Categoria {{$category->name}}</h3><br>
    <div class="row">

        @foreach($product as $prod)
            @if($prod->category_id == $category->id)
                <div class="col-md-3" id="category-product">
                    <a href="{{route('showProduct',$prod->id)}}">
                        <div class="card p-3">

                            <div class="text-center">
                                <img class="img-thumbnail lista-de-produtos" src="{{asset($prod->image)}}" width="200" alt="{{$prod->product_name}}">
                            </div>

                            <div class="product-details">

                                <span class="text-center d-block text-product">{{$prod->product_name}}</span>
                                <span class="font-weight-bold text-center d-block text-product">R$ {{$prod->price}}</span>

                                <div class="weight mt-2 text-center d-block text-product">
                                    <small>{{round($prod->stock)}} Unidades em estoque</small>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
        </div>
    </div>

</body>
</section>

