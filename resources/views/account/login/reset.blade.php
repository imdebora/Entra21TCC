@extends('layouts.layout')
@push('style')
    <link rel="stylesheet" href="{{asset('css/admin/login/login.css')}}">
@endpush
<main class="main">
    <div class="container-fluid px-0" >
        <div class="container">
            <div class="row flex-center min-vh-100 py-5" id="reset-password">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xxl-4">
                    <div class="text-center mb-6">
                        @if(!empty($message))
                            <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                        @endif
                        <h4 class="text-800">Esqueceu a senha?</h4>
                        <p class="text-700 mb-5">Insira o E-mail e te enviaremos um link para reset :)</p>
                        <form class="d-flex align-items-center mb-5" method="POST" action="{{route('password.email')}}">
                            @csrf
                            <input class="form-control flex-1" id="email" type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn btn-primary ms-2">Enviar<span class="fas fa-chevron-right ms-2"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

