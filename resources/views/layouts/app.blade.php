<!-- Es el header para las vistas lo pueden modificar como quieran los de front, ya que es un header y es llamado en todas las vistas
les recomiendo llamen al css que elaboren y asi el css influye en todas las vistas que exporten el layouts-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de Gestión UNEG</title>
    <link rel="shortcut icon" href="https://seeklogo.com/images/U/uneg-logo-2D2635F1F5-seeklogo.com.gif">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">UNEG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                </li>
                            @endif
                        @else
                        <li><a class="nav-link" href="{{ route('users.index') }}">Gestión de Usuarios</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Gestión de Roles</a></li>
                        <li><a class="nav-link" href="{{ route('products.index') }}">Gestión de Productos</a></li>
                        <li><a class="nav-link" href="{{ route('people.index') }}">Gestión de Personas</a></li> 
                        
                        <li><a class="nav-link" href="{{ route('incriptions.index') }}">Ver datos</a></li>
                        <li><a class="nav-link" href="{{ route('incriptions.create') }}">Inscribir</a></li> 

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
