@extends('layouts.layout')
@push('style')
    <link rel="stylesheet" href="{{asset('css/others/carShopping.css')}}">
@endpush
<div class="cart_section">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Carrinho de Compras<small> (Voce tem X Itens no Carrinho) </small></div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all () as $error)
                                    <li> {{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="cart_items">
                        <ul class="cart_list">
                            @if(!empty($viewData['products']))
                                <div class="cart_item_price cart_info_col">
                                    <a href="{{route('destroyCart')}}">
                                        <div class="cart_item_title text-danger">Limpar Carrinho <img src="{{asset('img/icone/recycle-bin.png')}}" width="20px" alt="limpar carrinho">
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <div class="cart_item_price cart_info_col text-success p-2">Boas Compras!</div>
                            @foreach ($viewData["products"] as $product)
                                <li class="cart_item clearfix">
                                <div class="cart_item_image img-thumbnail"><img src="{{($product->getImage())}}" alt="{{ $product->getProductName() }}"></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Nome</div>
                                        <div class="cart_item_text">{{ $product->getProductName() }}</div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantidade</div>
                                        <div class="cart_item_text">
                                                {{$quantidade[$product->getId()]}} Unidades

                                        </div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Preco</div>
                                        <div class="cart_item_text">R$ {{ $product->getPrice() }}</div>
                                    </div>



                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">R$ {{$product->getPrice() * $quantidade[$product->getId()]}}</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Total da Compra:</div>
                            <div class="order_total_amount">R$ {{($viewData['total'])}}
                            </div>
                        </div>
                    </div>
                    <form action="{{route('completeOrder')}}" method="POST">
                        @csrf
                    <div class="cart_buttons"><button type="submit" class="button cart_button_checkout">Finalizar Compra</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

