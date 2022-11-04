@extends('admin.management.adminHeader')
@include('admin.management.subview.navbar')
@section('search')
<div class="search-bar p-3 ">
    <form class="search-form d-flex align-items-center" method="GET" action="{{route('list')}}" autocomplete="off">
        <input type="text" name="search" placeholder="Pesquisar Produtos" title="Procurar Produtos"><button type="submit"><i class="bi bi-search"></i></button>
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
                <h5 class="card-title text-center">Lista de Produtos</h5>
                <table class="table table-striped table-hover table-scrollable">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Estoque</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>

                            <td>{{ $product->product_name }}</td>

                            <td>R$ {{ $product->price }}</td>

                            @foreach($categories as $category)
                            @if($category->id == $product->category_id)
                            <td>{{ $category->name }}</td>
                            @endif
                            @endforeach


                            <td>@if($product->stock > 0){{ round($product->stock) }} @else <strong class="bg-danger p-1 text-white rounded">Sem Estoque</strong> @endif</td>


                            <td>
                                <a href="{{route('editProduct', $product->id)}}">
                                    <img src="{{asset('img/icone/edit.png')}}" width="20px" alt="editar item">
                                </a>
                            </td>


                            <form method="POST" action="{{route('destroy', $product->id)}}" onsubmit="return confirm('Deseja Remover {{addslashes($product->product_name)}}? Esta ação não poderá ser desfeita.')">
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
{{ $products->links() }}
</div>
