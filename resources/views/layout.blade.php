<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi Sitio</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/sweetalert/sweetalert.min.js"></script>
    
    <link rel="stylesheet" href="/sweetalert/sweetalert.css">
</head>
<body>
    <header>
        <?php
            function activeMenu($url)
            {
                return request()->is($url) ? 'active' : 'no-active';
            }
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            
                <a class="navbar-brand" href="#">Laravel</a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ activeMenu('/') }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item {{ activeMenu('saludos/*') }}">
                            <a class="nav-link" href="{{ route('saludos', 'Jona') }}">Saludos</a>
                        </li>
                        <li class="nav-item {{ activeMenu('mensajes/create') }}">
                            <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
                        </li>
                        
                        
                        @if (auth()->check())
                            <li class="{{ activeMenu('mensajes*') }}">
                                <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
                            </li>
                            @if (auth()->user()->hasRoles(['admin']))
                                <li class="{{ activeMenu('usuarios*') }}"> 
                                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="nav-item float-right {{ activeMenu('login') }}">
                            @if (auth()->guest())
                                <a class="nav-link" href="/login">Login</a>
                            @else
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/logout">Cerrar Sesion</a>
                                </div>
                            </li>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
    </header>


    <div class="container">

        @yield('contenido')



    
    <footer>Copyright {{ date('y') }}</footer>
    </div>
    
    @include('sweet::alert')

    {{-- <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>