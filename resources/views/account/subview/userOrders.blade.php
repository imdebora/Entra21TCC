@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('js/profile.js')}}"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{asset('css/profile/profile.css')}}">
@endpush
@section('events')
    <section class="container">
        <div style="border:solid 1px;" class="container p-5 my-5 bg-white w-75">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-10 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <img src="{{asset('img/logo-design/EuQueFizLogo.jpg')}}" width="100px" alt="logo-euquefiz"><h4 class="text-right">Minha Nota</h4>
                            </div>

                            @if(!empty($message))
                                <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                            @endif

                            <div class="d-flex justify-content-center ">

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label class="labels">Notas Fiscal</label>

                                        @foreach($productInfo as $products)
                                            <table class="table ">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Produto</th>
                                                    <th scope="col">Quantidade</th>
                                                    <th scope="col">Preço UN</th>
                                                    <th scope="col">Preço Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$products['product_name']}}</td>

                                                    <td>{{$products['quantity']}}</td>

                                                    <td>R$ {{$products['price']}}</td>

                                                    <td>R$ {{$products['price'] * $products['quantity']}}</td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection