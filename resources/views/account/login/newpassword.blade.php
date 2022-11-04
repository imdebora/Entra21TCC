@extends('layouts.layout')

<section id="section-new-password">
    <div class="new-password-background">
    <div class="row justify-content-center">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100" id="div-centralizada">

                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 new-password">
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                    <form method="POST" action="{{ route('storeNewPassword') }}">
                        @csrf

                        <div class="d-flex mb-3 pb-1" id="logo-image">
                            <img src="{{asset('img/logo-design/Euquefizlogo.png')}}" class="mt-4" width="110px" alt="logo-eu-que-fiz">
                        </div>
                        <h5 class="fw-normal mb-3 pb-3 login-title">Nova Senha</h5>
                        <input type="hidden" name="token" value="{{ $token }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all () as $error)
                                        <li> {{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="campo-new-password">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" w-100 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
