@extends('layouts.layout')
@push('scripts')
    <script src="{{asset('js/profile.js')}}"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{asset('css/profile/profile.css')}}">
@endpush
@section('events')
    <section>
        <div style="border:solid 1px;" class="container p-5 my-5 bg-white w-75">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-md-10 border-right">
                        <div class="p-3 py-5">

                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <h4 class="text-right">Configuração de Perfil</h4>
                            </div>

                            @if(!empty($message))
                                <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                            @endif

                            <form action="{{route('saveProfile')}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="d-flex justify-content-center ">

                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Nome</label>
                                            <input type="text" required name="name" class="form-control" value="{{$user->name}}">
                                        </div>

                                        @error('name')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Nome Inválido</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">CPF</label>
                                            <input type="text" required name="cpf" class="form-control" value="{{$user->cpf}}">
                                        </div>

                                        @error('cpf')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">CPF Inválido</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Telefone</label>
                                            <input type="tel" required name="telefone" class="form-control" value="{{$user->telefone}}">
                                        </div>

                                        @error('telefone')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Telefone Inválido</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Cidade</label>
                                            <input type="text" required name="cidade" class="form-control" value="{{$user->cidade}}">
                                        </div>

                                        @error('cidade')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Cidade Inválida</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Endereço</label>
                                            <input type="text" required name="endereco" class="form-control" value="{{$user->endereco}}">
                                        </div>

                                        @error('endereco')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Endereco Inválido</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Data de Nascimento</label>
                                            <input type="date" required name="nascimento" class="form-control" value="{{$user->nascimento}}">
                                        </div>

                                        @error('nascimento')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Data de Nascimento Inválida</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">CEP</label>
                                            <input type="text" required name="cep" class="form-control" value="{{$user->cep}}">
                                        </div>

                                        @error('cep')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">CEP Inválido</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Nova senha</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>

                                        @error('cep')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">Senha Inválida</small>
                                        @enderror

                                        <div class="col-md-12">
                                            <label class="labels">Confirmar senha</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>

                                        @error('password_confirmation')
                                        <small class="bg-danger text-white w-50 rounded" role="alert">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">Editar perfil</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

