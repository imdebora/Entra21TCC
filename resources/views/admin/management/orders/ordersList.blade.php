@extends('admin.management.adminHeader')
@include('admin.management.subview.navbar')
@section('search')
    <div class="search-bar p-3 ">
        <form class="search-form d-flex align-items-center" method="GET" action="{{route('ordersList')}}" autocomplete="off">
            <input type="text" name="search" placeholder="Pesquisar Nota por ID" title="Procurar Nota Fiscal"><button type="submit"><i class="bi bi-search"></i></button>
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
                <h5 class="card-title text-center">Notas Fiscais</h5>
                <table class="table table-striped table-hover table-scrollable">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">User</th>
                        <th scope="col">Data</th>
                        <th scope="col">Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>

                            <td >{{ $order->id }}</td>

                            <td>R$ {{ $order->total }}</td>

                            @foreach($users as $user)
                                @if($order->user_id == $user->id)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach

                            <td>{{ $order->created_at }}</td>

                            <form method="POST" action="{{route('destroyOrder', $order->id)}}" onsubmit="return confirm('Deseja Remover a Nota Fiscal {{$order->id}} ? Esta ação não poderá ser desfeita.')">
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
{{ $orders->links() }}
</div>
