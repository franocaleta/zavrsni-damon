<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

@include('homepage.modalACC')

    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/second">Početna</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" method="GET" action="/searchTest">
                        <div class="form-group">
                            <input type="text" class="form-control" name="titlesearch" placeholder="Pretraži..">
                        </div>
                        <button type="submit" class="btn btn-default" style="position: absolute; left: -9999px">>Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">


                        <li> <a href="/events/index" class="portfolio-link" data-toggle="modal">Događaji</a></li>
                        <li> <a href="#myModal4" class="portfolio-link" data-toggle="modal">Objavi predmet</a></li>
                        <li> <a href="#myModal3" class="portfolio-link" data-toggle="modal">Poruke <span class="badge">{{$br}}</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#aboutModal" data-toggle="modal" data-target="#myModal">Moj profil</a></li>
                                <li> <a href="#myModal5" class="portfolio-link" data-toggle="modal">Stvori događaj</a></li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @include('posts.createModal')
    @include('messages.allmessages')
    @include('events.createModal')
    </div>
<script src="/js/komentari.js" type="text/javascript"></script>
</body>
</html>
