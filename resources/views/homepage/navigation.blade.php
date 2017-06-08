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
                <ul class="nav navbar-nav navbar">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Aktualno</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Kako koristiti</a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#aboutModal" data-toggle="modal" data-target="#myModalLOG">Prijava</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#aboutModal" data-toggle="modal" data-target="#myModalREGISTER">Registracija</a>
                        </li>
                    @else
                        <li><a href="#aboutModal" data-toggle="modal" data-target="#myModal">{{ Auth::user()->name }}</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>