@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('js/profile.js')}}"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{asset('css/profile/profile.css')}}">
@endpush
    <section>
    <div class="p-5 my-5 bg-white section-profile">
        <div style="border:solid 1px;" class="container p-5 my-5 bg-white w-75">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-10 border-right">
                        <div class="p-3 py-5">

                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <h4 class="text-right">Seu Perfil</h4>
                            </div>
                            <div class="home-profile">
                                <a href="{{route('dices')}}" class="links-for-profile">
                                    <div class="border-home">Editar Dados
                                        <img src="{{asset('img/icone/edit-profile.png')}}" width="30px" alt="editar-perfil">
                                    </div>
                                </a>

                                <a href="{{route('data')}}" class="links-for-profile">
                                    <div class="border-home">Meus Pedidos
                                        <img src="{{asset('img/icone/order-list.png')}}" width="30px" alt="lista-de-pedidos">
                                    </div>
                                </a>
                            </div>
                            @if(!empty($message))
                                <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


