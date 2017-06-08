<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Damon</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{URL::asset('css/freelancer.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Modal - ono što se poziva iz navigacije prilikom klika na korisnicki racun/login/register-->
@include('homepage.modalACC')

<!-- Navigation -->
<div class="navigation">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="container">
                    <div class="row">
                        <ul class="nav navbar-nav navbar">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="page-scroll">
                                <form class="navbar-form navbar-left" role="search" method="GET" action="/searchTest">
                                    <button type="submit" class="btn btn-default" style="position: absolute; left: -9999px"><span class="glyphicon glyphicon-search" aria-hidden="true">Pretraži</span></button>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="titlesearch" placeholder="Pretraži">
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::check())
                            </li>
                            <li class="page-scroll">
                                <a href="#portfolio">Poruke</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background-color: #2c3e50;">
                                    <li><a href="/profil/{{\Illuminate\Support\Facades\Auth::id()}}">Korisnički račun</a></li>
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
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>

<div class="cont">
    @yield('contentParent')
</div>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- jQuery -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="{{URL::asset('js/jqBootstrapValidation.js')}}"></script>
<script src="{{URL::asset('js/contact_me.js')}}"></script>

<!-- Theme JavaScript -->
<script src="{{URL::asset('js/freelancer.min.js')}}"></script>

</body>

</html>
