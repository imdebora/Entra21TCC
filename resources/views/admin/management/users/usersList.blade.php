@extends('admin.management.adminHeader')
@include('admin.management.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" action="{{route('usersList')}}" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Cliente" title="Procurar Cliente"><button type="submit"><i class="bi bi-search"></i></button>
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
                <h5 class="card-title text-center">Usuarios</h5>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Promover</th>
                        <th scope="col">Rebaixar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @if($user->id != 1)
                        <tr>
                            <td> @if (!empty($user->image))
                                    <img src="{{asset($user->image)}}" alt="imagem-de-perfil">
                                @else <p class="text-danger">Imagem Indisponível</p>
                                @endif
                            </td>
                            <td >{{ $user->name }}</td>
                            <td >{{ $user->user_type }}</td>
                            <form method="POST" action="{{route('destroy', $user->id)}}" onsubmit="return confirm('Deseja Remover {{addslashes($user->name)}}? Esta ação não poderá ser desfeita.')">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button type="submit" class="border-0"><img src="{{asset('img/icone/recycle-bin.png')}}" width="20px" alt="apagar item">
                                    </button>
                                </td>
                            </form>
                            <form method="POST" action="">
                                @method('put')
                                @csrf
                                <td>
                                        <button
                                            type="submit" name="userPromotion"
                                            formaction="{{route('userPromotion', $user->id)}}"
                                            class="border-0">
                                            <img src="{{asset('img/icone/arrow-up.png')}}" width="20px" alt="promover usuario"  onsubmit="return confirm('Deseja Rebaixar a Usuário {{addslashes($user->name)}}?')">
                                        </button>
                                </td>
                                <td>
                                        <button
                                            type="submit" name="userDemoted"
                                            formaction="{{route('userDemoted', $user->id)}}"
                                            class="border-0">
                                            <img src="{{asset('img/icone/arrow-down.png')}}" width="20px" alt="rebaixar-usuario"  onsubmit="return confirm('Deseja Rebaixar a Usuário {{addslashes($user->name)}}?')">
                                        </button>
                                    </td>
                            </form>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="pagination-links">
    {{ $users->links() }}
</div>
