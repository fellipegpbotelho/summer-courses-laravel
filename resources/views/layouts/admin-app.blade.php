<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @auth('admin')
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Clientes</a></li>
                            <li><a href="{{ route('admin.products.index') }}"><i class="fa-product-hunt" aria-hidden="true"></i>&nbsp; Produtos</a></li>
                            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-first-order" aria-hidden="true"></i>&nbsp; Pedidos</a></li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest('admin')
                            <li><a href="{{ route('admin.login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success bg-green-jungle bg-font-green-jungle border-green-jungle alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"></button>
                            <i class="fa fa-check-circle" aria-hidden="true"></i> <strong>
                                SUCESSO! </strong> {{ $message }}
                        </div>
                    @elseif ($message = Session::get('danger'))
                        <div class="alert alert-danger bg-red-mint bg-font-red-mint border-red-mint alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true"></button>
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>
                                ERRO: </strong> {{ $message }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/9260d106a3.js"></script>
</body>
</html>
