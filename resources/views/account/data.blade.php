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
                                <img src="{{asset('img/logo-design/EuQueFizLogo.jpg')}}" width="100px" alt="logo-euquefiz"><h4 class="text-right">Meus Dados</h4>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <h4 class="text-right">Saldo Atual R$ {{$user->balance}}</h4>
                            </div>

                            @if(!empty($message))
                                <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                            @endif

                                <div class="d-flex justify-content-center ">

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Pedidos</label>

                                        @for($i = 0; $i < count($user->getOrders()['orders']); $i++)
                                            <table class="table">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Data (Y/M/D)</th>
                                                    <th scope="col">Ver Mais</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>

                                                    <td>R$ {{$user->getOrders()['orders'][$i]['total']}}</td>

                                                    <td>{{\Carbon\Carbon::parse($user->getOrders()['orders'][$i]['created_at'])}}</td>

                                                            <td>
                                                                <a href="{{route('userOrder',$user->getOrders()['orders'][$i]['id'])}}">
                                                                <img src="{{asset('img/icone/seta-para-a-direita.png')}}" width="30px">
                                                                </a>
                                                            </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                            @endfor

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

