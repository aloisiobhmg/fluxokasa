<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('style')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">

</head>

<body id="body">

    <div class="acontainer">
        <nav class="navbar superior">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <a href="#">Assinantes</a>
                <a href="#">gestão de vídeos</a>
                <a class="active_link" href="#">Admin</a>
            </div>
            <div class="navbar__right">
                <a href="#">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <img width="30" src="assets/avatar.svg" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
            </div>
        </nav>
        <main>

            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×
                        </button>
                        <p><strong>Ops, algo deu errado</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <div class="alert alert-{{ $msg }}" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×
                            </button>
                            {!! Session::get('alert-' . $msg) !!}
                        </div>
                    @endif
                @endforeach

                @yield('content')
            </div>
        </main>

        <div id="sidebar">
            <div class="sidebar__title">
                <div class="sidebar__img">
                    <img src="{{ asset('Sem título-2.fw.png') }}" alt="logo" />
                    <h1>Fluxokasa</h1>
                </div>
                <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link">
                    <i class="fa fa-home"></i>
                    <a href="{{ route('dashboard') }}">painel de controle</a>
                </div>
                <h2>Gestão</h2>
                <div class="sidebar__link">
                    <i class="fa fa-user-secret" aria-hidden="true"></i>
                    <a href="#">Controle de Contas</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-building-o"></i>
                    <a href="{{ route('index_Categoria') }}">Cadastro de categorias</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-wrench"></i>
                    <a href="#">Cadastro de Empresas</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-archive"></i>
                    <a href="#">centros de custo</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-handshake-o"></i>
                    <a href="#">Contratos</a>
                </div>
                <h2>licenÃ§a</h2>
                <div class="sidebar__link">
                    <i class="fa fa-question"></i>
                    <a href="#">solicitações</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-sign-out"></i>
                    <a href="#">Política de licença</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-calendar-check-o"></i>
                    <a href="#">Dias especiais</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-files-o"></i>
                    <a href="#">Pedir licenças</a>
                </div>
                <h2>FOLHA DE PAGAMENTO</h2>
                <div class="sidebar__link">
                    <i class="fa fa-money"></i>
                    <a href="#">Folha de pagamento</a>
                </div>
                <div class="sidebar__link">
                    <i class="fa fa-briefcase"></i>
                    <a href="#">Nível salarial</a>
                </div>
                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>




    @yield('script')
</body>

</html>
