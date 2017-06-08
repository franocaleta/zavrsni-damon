
@extends('layouts.app')


@section('content')

    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="jumbotron col-lg-8 col-lg-offset-2">
                    <div class="span8">
                        <div class="row">
                            <div class="span8">
                                <h4><strong><a href="#">{{$post->name}}</a></strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2">
                                <img src="{{ URL::to('/') }}/img//{{$post->picture}}" width="400px" style="float:left" height="310px" class="img-rounded" alt="laptop">
                            </div>

                            <div class="span10">
                                <div class="span20">
                                    <h4><strong>  Opis: {{$post->description}}
                                        </strong></h4>
                                </div>

                                @if(($post->status)=="sent")

                                    <h4><strong> <p><a class="btn" href="/posts/{{$post->id}}/confirm">Potvrdi</a></p></strong></h4>
                                @else
                                    <h4><strong> <p>Potvrđeno</p></strong></h4>
                                @endif



                            </div>
                        </div>
                        <div class="row">
                            <div class="span8">
                                <p></p>
                                <p>

                                    <i class="icon-calendar"></i> {{$post->created_at->diffForHumans()}}
                                    | <i class="icon-comment"></i> <a href="#komentari{{$post->id}}"  data-toggle="modal" >Komentari</a>
                                    | <i class="icon-tags"></i><br>
                                    Tagovi : <ul class="list-inline item-details">
                                    @foreach($post->tags as $tag)
                                        <li>
                                            <strong><a href="http://startbootstrap.com"><span class="label label-info">{{$tag->name}}</span></a>
                                            </strong>
                                        </li>
                                    @endforeach
                                </ul>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="komentari{{$post->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="page-header">
                                    <h1><small class="pull-right">{{$post->comments->count()}} Komentara</small> Komentari </h1>
                                </div>
                                @foreach($post->comments as $comment)
                                    <div class="row" id="comments{{$post->id}}">
                                        <div class="col-sm-1">
                                            <div class="thumbnail">
                                                @if(is_null($comment->user->profilePic))
                                                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                                @else
                                                    <img class="img-responsive user-photo" src="{{ URL::to('/') }}/img/profile//{{$comment->user->profilePic}}">
                                                @endif

                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-5">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <strong>{{$comment->user->name}} {{$comment->user->lastname}}</strong> <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                                                </div>
                                                <div class="panel-body">
                                                    {{$comment->content}}
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                    </div><!-- /row -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <form method="POST"  action="/ajax/comment/{{$post->id}}"  id = comment{{$post->id}}  >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label" for="inputDefault">Komentiraj</label>
                            <input type="text" class="form-control" id=content{{$post->id}} name="content">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary" >Komentiraj</button>

                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>



@endsection