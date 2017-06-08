@extends('layouts.app')


@section('content')

@foreach($posts as $post)
    @include('secondpage.postPictureExpand')
    @endforeach

    <div class="container">
        <div class="row">
            <div class="jumbotron col-lg-8 col-lg-offset-2">

                <img src="{{URL::asset('img/portfolio/naslovna.jpg')}}" height="0.4" class="img-responsive" alt="">
                <h1 id = "text">Damon</h1>
            </div>

            <div class="container col-lg-8 col-lg-offset-2"><h1>Aktualno:</h1></div>
            <div class="panel panel-default col-lg-8 col-lg-offset-2" style="background: none">

                <div class="panel-body">
                    @foreach($posts as $post)
                    <div class="col-lg-4 portfolio-item" style="padding-bottom: 10px">
                        <a href="#portfolioModal1{{$post->id}}" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="{{ URL::to('/') }}/img/{{($post->picture)}}" width="210px" height="210px" class="img-rounded" alt="laptop">
                        </a>
                    </div>


                    @endforeach
                </div>

                <ul class="pager">
                    <li><a href="/second/{{$id2-1}}">Prethodna</a></li>
                    <li><a href="/second/{{$id2+1}}">Sljedeća</a></li>
                </ul>
            </div>

        </div>
    </div>

@endsection