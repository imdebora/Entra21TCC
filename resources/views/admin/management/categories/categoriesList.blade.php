@extends('admin.management.adminHeader')
@include('admin.management.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" action="{{route('categoriesList')}}" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Categorias" title="Procurar Categorias"><button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
@endsection
<section id="products">
    <div class="col-xs-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                @if(!empty($message))
                    <div class="text-white alert alert-success bg-success text-center">{{$message}}</div>
                @endif
                <h5 class="card-title text-center">Lista de Categorias</h5>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> @if (!empty($category->image))
                                        <img src="{{asset($category->image)}}" class="img-thumbnail w-25"  alt="imagem da categoria">
                                @else <p class="text-danger">Imagem Indisponível</p>
                                 @endif
                            </td>

                            <td >{{ $category->name }}</td>

                            <form method="POST" action="{{route('destroyCategory', $category->id)}}" onsubmit="return confirm('Deseja Remover {{addslashes($category->name)}}? Esta ação não poderá ser desfeita.')">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button type="submit" class="border-0"><img src="{{asset('img/icone/recycle-bin.png')}}" width="20px" alt="apagar item">
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="pagination-links">
    {{ $categories->links() }}
</div>
