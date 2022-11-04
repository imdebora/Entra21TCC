<aside id="sidebar" class="sidebar bg-dark">
    <ul class="sidebar-nav " id="sidebar-nav">

        <li class="nav-item"><a class="nav-link " href="{{route('management')}}">
                <img src="{{asset('img/icone/product-return.png')}}" class="mt-4" width="30px" alt="retornar"><span class="dropdown-menu-space">Voltar ao Dashboard</span></a>
        </li>

        <li class="nav-item  bg-light">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <img src="{{asset('img/icone/people.png')}}" class="mt-4" width="30px" alt="users">
                    <span class="dropdown-menu-space">Usuários</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('usersList')}}">
                        <i class="bi bi-circle"></i>
                        <span>Listar Usuários</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  bg-light">
            <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                <img src="{{asset('img/icone/order.png')}}" class="mt-4" width="30px" alt="nota-fiscal">
                    <span class="dropdown-menu-space">Notas Fiscais</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="{{route('ordersList')}}"><i class="bi bi-circle"></i><span>Listar Notas</span></a></li>
            </ul>
        </li>

        <li class="nav-item bg-light ">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <img src="{{asset('img/icone/portable-fridge.png')}}" class="mt-4" width="30px" alt="produtos">
                    <span class="dropdown-menu-space">Produtos</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="{{route('list')}}"> <i class="bi bi-circle"></i><span>Listar Produtos</span> </a></li>
                <li> <a href="{{route('createProduct')}}"> <i class="bi bi-circle"></i><span>Adicionar Produto</span> </a></li>
                <li> <a href="{{route('categoriesList')}}"> <i class="bi bi-circle"></i><span>Listar Categorias</span> </a></li>
                <li> <a href="{{route('createCategory')}}"> <i class="bi bi-circle"></i><span>Adicionar Categoria</span> </a></li>
            </ul>
        </li>

        <li class="nav-item bg-light">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <img src="{{asset('img/icone/under-construction.png')}}" class="mt-4" width="30px" alt="em-contrucao">
                    <span class="dropdown-menu-space">Em Construção</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li> <a href="#"> <i class="bi bi-circle"></i><span>Em Breve....</span> </a></li>
                <li> <a href="#"> <i class="bi bi-circle"></i><span>Em Breve....</span> </a></li>
            </ul>
        </li>
    </ul>
</aside>
