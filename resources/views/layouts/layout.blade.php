<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @stack('style')
    <link href="{{asset('img/logo-design/LogoSemFundo.png')}}" rel="icon">
    <link href="{{asset('img/logo-design/LogoSemFundo.png')}}" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-615XKQXEJX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-615XKQXEJX');
    </script>
    <title>Eu Que Fiz</title>
</head>
@php
    $categories = \App\Models\Category::all();
@endphp
<body>
<div id="cover-background">
<main id="home-page">
    <header id="header" class="header fixed-top d-flex align-items-center pb-3">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{route('home')}}" class="navbar-brand" >

                <img src="{{asset('img/logo-design/Euquefizlogo.png')}}" class="mt-5" width="170px" alt="logo-eu-que-fiz">
            </a>
            <nav id="navbar" class="navbar navbar-expand-sm background">
                <ul>
                    <li class="dropdown"><a href="{{route('productsList')}}"><span>Cardápio</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @if(!empty($categories))
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('categoryPage',$category->id)}}">
                                        <span>{{$category->name}}</span>
                                        <i class="bi bi-chevron-down dropdown-indicator"></i>
                                    </a>
                                </li>
                            @endforeach
                            @endif
                            <li><a href="{{route('productsList')}}">Ver Todos</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('events')}}">Eventos</a></li>
                    <li><a href="{{route('gallery')}}">Galeria</a></li>
                    <li><a href="{{route('aboutus')}}">Sobre</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Devs</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li><a href="https://www.linkedin.com/in/xadrak/" target="_blank">Adriano Machado</a></li>
                            <li><a href="https://www.linkedin.com/in/bruno-hoffmann-schumacher-0b4631168/" target="_blank">Bruno Schumacher</a></li>
                            <li><a href="https://www.linkedin.com/in/claudio-junior-872444251/" target="_blank">Cláudio Júnior</a></li>
                            <li><a href="https://www.linkedin.com/in/deborabl/" target="_blank">Debora de Lima</a></li>
                            <li><a href="https://www.linkedin.com/in/marlimeza/" target="_blank">Marli Mezza</a></li>
                            <li><a href="https://www.linkedin.com/in/matheussan/" target="_blank">Matheus Santos</a></li>
                            <li><a href="https://www.linkedin.com/in/thiagowolter/" target="_blank">Thiago Wolter</a></li>
                            <li><a href="https://www.linkedin.com/in/willnmafra/" target="_blank">Willian Mafra</a></li>
                        </ul>
                    </li>
                    @auth()
                        <li><a href="{{route('management')}}">Admin</a></li>
                    @endauth

{{--                    Protecao Desativada Para Apresentacao--}}
{{--                    @auth--}}
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->getUserType() == 'admin')--}}
{{--                        <li><a href="{{route('management')}}">Admin</a></li>--}}
{{--                    @endif--}}
{{--                    @endauth--}}
                    <li>
                        <a href="{{route('carShopping')}}">
                            <img src="{{asset('img/icone/shopping-bag.png')}}" alt="icone-carrinho" width="30" height="25">
                        </a>
                    </li>
                    @guest
                    <li class="dropdown">
                        <a href="#"><span>Entrar / Cadastrar</span>
                            <i class="bi bi-chevron-down dropdown-indicator"></i>
                        </a>
                        <ul>
                            <li><a href="{{route('login')}}">Entrar</a></li>
                            <li><a href="{{route('register')}}">Criar conta</a></li>
                        </ul>
                    </li>
                    @endguest
                    @auth
                    <li><a href="{{route('profileIndex')}}">Perfil</a></li>
                    <li><a href="{{route('logout')}}">Sair</a></li>
                    @endauth
                    <li>
                    <li><a href="https://whatsa.me/5548998117740/?t=Gostaria%20de%20Fazer%20um%20Pedido" target="_blank"><img src="{{asset('img/icone/whatsapp.png')}}" width="40px" class="icone-whatsapp" alt="fechar-menu"></a></li>
                </ul>
            </nav>


            <img width="30px" src="{{asset('img/icone/dropdown.png')}}" class="mobile-nav-toggle mobile-nav-show bi bi-list" alt="abrir menu">
            <img src="{{asset('img/icone/dropdown.png')}}" width="20px" class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x" alt="fechar-menu">
        </div>
    </header>
    @yield('mainContent')
    @yield('gallery')
    @yield('aboutus')
    @yield('events')
    @yield('chefs')
</main>
</div>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container align-items-center">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <!-- <img width="30px" height="30px" src="{{asset('img/icone/shopping-bag.png')}}" alt="endereço para contato"> -->
                <div>
                    <h4>Endereço</h4>
                    <p>
                        Rua Bom Jesus, 345<br />
                        Garopaba - SC CEP - Brasil <br />
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <!-- <img  width="30px" height="30px"  src="{{asset('img/icone/shopping-bag.png')}}" alt="contato para reservas"> -->
                <div>
                    <h4>Reservas</h4>
                    <p>
                        <strong>Contato</strong> (48) 99811-7740<br />
                        <strong>Email:</strong> euquefiz.e21@gmail.com <br />
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <!-- <img  width="30px" height="30px" src="{{asset('img/icone/shopping-bag.png')}}" alt="horário de funcionamento"> -->
                <div>
                    <h4>Horário de Funcionamento</h4>
                    <p>
                        <strong>9:00h às 17:00h <br />
                        Sábados: 9:00h às 13:00h</strong>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6  footer-links">
                <h4>Siga-nos</h4>
                <div class="d-flex">
                    <a href="#" >
                        <img class="icone" src="{{asset('img/icone/twitter-icone.png')}}" alt="icone do twitter"></a>
                    <a href="https://github.com/WillianMafra/ecommerce-euquefiz" target="_blank">
                        <img class="icone" src="{{asset('/img/icone/github-icone.png')}}" alt="icone do github">
                    </a>
                    <a href="#">
                        <img class="icone" src="{{asset('img/icone/linkedin-icone.png')}}" alt="icone do linkedin">
                    </a>
                    <a href="https://www.instagram.com/euquefizcongelados/" target="_blank">
                            <img class="icone" src="{{asset('img/icone/instagram-icone.png')}}" alt="icone do instagram">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<input type="image" src="{{asset('img/icone/scrollup.png')}}" id="bottonUp"  class="scroll-top d-flex align-items-center justify-content-center" alt="subir para o topo da página">
{{--Descomente a linha abaixo para inserir um pré-loader--}}
{{--<div id="preloader"></div>--}}
<!-- JavaScript Bundle with Popper -->

@stack('scripts')

<script src="{{asset('js/app.js')}}"></script>
<script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
<script>

    var ht = new HT({

        token: "773035674080b2c0959c2ab628f63b33"

    });

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{asset('js/carousel.js')}}"></script>


</body>
</html>
