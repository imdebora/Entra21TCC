@extends('admin.management.adminHeader')
@section('adminDashboard')
    @include('admin.management.subview.navbar')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="/" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white"><a href="{{route('management')}}">Dashboard</a></li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row table-admin-fundo">
                    <div class="col-xxl-4 col-md-6  card-padding">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Vendas</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><img src="{{asset('img/icone/shopping-cart.png')}}" width="30px" alt="carrinho-de-compras"></div>
                                    <div class="ps-3">
                                        <p><b> Total de Vendas Atuais</b> {{$rentability['quantity']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6 card-padding">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Receita</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><img src="{{asset('img/icone/cifrao.png')}}" width="30px" alt="icone-cifrao"></div>
                                    <div class="ps-3">
                                        <h6 class="text-dark">R$ {{number_format($rentability['total'],2,",",".")}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert-button"><button class="button-alert-admin" onclick="alert('Bem-Vindos Ao EuQueFiz, O Painel De Admin É Protegido Por Middleware, Porém Está Aberto Temporariamente Para Apresentação!')">Convidados Cliquem Aqui</button></div>
                    <div class="col-xxl-4 col-xl-12  card-padding">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Clientes</h5>
                                <div class="d-flex align-items-center">
                                   <img src="{{asset('img/icone/diversity.png')}}" width="50px" alt="clientes-icone">
                                    <div class="ps-3">
                                        <b><p class="text-dark">Atualmente Temos {{$usersQuantity}} Clientes Registrados</p></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto table-admin">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Últimas Vendas</h5>
                                <table class="table table-borderless datatable">
                                    <thead >
                                    <tr class="table-admin-head">
                                        <th scope="col">ID</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Preço Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($lastDataByDate))
                                    @foreach($lastDataByDate as $data)
                                        @if($loop->odd)
                                            <tr class="table-secondary">
                                                @endif
                                            <th scope="row">{{$data['id']}}</th>
                                            <td>{{$data['user_name']}}</td>
                                            <td>R$ {{number_format($data['total'],2,",",".")}}</td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card top-selling overflow-auto table-admin">
                            <div class="card-body pb-0">
                                <h5 class="card-title text-dark">Top Vendas</h5>
                                <table class="table table-borderless" >
                                    <thead>
                                    <tr class="table-admin-head">
                                        <th scope="col">Nota ID</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Preço Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($lastDataByTotal))
                                    @foreach($lastDataByTotal as $data)
                                    @if($loop->odd)
                                        <tr class="table-secondary">
                                    @endif
                                        <th scope="row">{{$data['id']}}</th>
                                        <td>{{$data['user_name']}}</td>
                                        <td>R$ {{number_format($data['total'],2,",",".")}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 info-padding">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atividades Recentes</h5>
                        <div class="activity">
                            @foreach($lastDataByTotal as $data)
                            <div class="activity-item d-flex">
                                <div class="activite-label">{{($data['created_at'])}}</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content"><strong>Usuário <span class="text-success">{{$data['user_name']}}</span> Realizou uma Compra de R$ {{number_format($data['total'],2,",",".")}}</strong></div>
                            </div>
                            @endforeach
                            @foreach($usersData as $userInfo)
                                @if($userInfo->id != 1)
                            <div class="activity-item d-flex">
                                <div class="activite-label">{{$userInfo->created_at->format('d/m/Y')}}</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content"><strong>{{$userInfo['name']}} Se Cadastrou</strong></div>
                            </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
