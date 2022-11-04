@extends('layouts.layout')
@push('style')
    <link rel="stylesheet" href="{{asset('css/admin/login/login.css')}}">
@endpush
<section style="background-color: #9A616D;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{asset('img/logo-design/Prato.jpg')}}"
                                 alt="login form" class="img-fluid img-prato"/>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="d-flex mb-3 pb-1" id="logo-image">
                                        <img src="{{asset('img/logo-design/Euquefizlogo.png')}}" class="mt-4" width="110px" alt="logo-eu-que-fiz">
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3 login-title">Entrar Na Conta</h5>
                                    @include('account.subview.erros')
                                    <div class="form-outline mb-4 ">
                                        <input type="email" id="form2Example17" class=" form-control form-control-lg" name="email"/>
                                        <label class="form-label" for="form2Example17">E-mail</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" />
                                        <label class="form-label" for="form2Example27">Senha</label>
                                    </div>
                                    <a href="{{route('resetPassword')}}">
                                        <p class="text-center text-white bg-secondary w-50 rounded hover-animation">Esqueceu a Senha?
                                        </p>
                                    </a>
                                    <div class="div-botton">
                                        <button class="btn btn-primary btn-lg btn-block hover-animation" type="submit">Login</button>


                                        <button class="btn btn-success btn-lg btn-block hover-animation">
                                            <a href="{{route('register')}}" class="text-white ">Cadastre-se
                                            </a>
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
