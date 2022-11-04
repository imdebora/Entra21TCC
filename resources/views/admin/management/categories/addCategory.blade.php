@extends('admin.management.adminHeader')
@include('admin.management.subview.navbar')
<section id="formulario">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Inserir Categoria</h5>
                <form enctype="multipart/form-data" method="POST" action="{{route('storeCategory')}}">
                    @csrf
                    <div class="row mb-3">
                        <label for="product_name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"></div>
                        @error('product_name')
                        <small class="bg-danger text-white w-25 rounded" role="alert">Nome Inválido</small>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Insira a Url da Imagem</label>
                        <div class="col-sm-10"><input class="form-control" type="text" id="formFile" name="image">
                            @error('image')
                            <small class="bg-danger text-white w-25 rounded" role="alert">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <div class=""><button type="submit" class="btn bg-success text-light">Confirmar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
