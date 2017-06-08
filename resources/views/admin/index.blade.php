@extends('layouts.adminapp')


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
                                <img src="{{ URL::to('/') }}/img//{{$post->picture}}" margin-right="10px" width="400px" style="float:left" height="310px" class="img-rounded" alt="laptop">
                            </div>
                            <br>
                            <div class="span8">
                                <p>
                                <div class="row">
                                    <div class="span8">
                                        <h6><strong>  Pošiljatelj: <blockquote>
                                <small><cite title="Source Title"><a href= "#myModal22" data-toggle="modal" data-whatever="@fat">{{$post->user->name}} {{$post->user->lastname}}</a></cite></small>
                                </blockquote>
                                                Adresa:  {{$post->user->country}}, {{$post->user->city}}  <br>
                                                {{$post->user->address}} {{$post->user->zipcode}} <br>
                                                {{$post->user->phone}}
                                            </strong></h6>
                                <div class="row">
                                    <div class="span8">
                                        <h6><strong>  Primatelj: <blockquote>
                                                    <small><cite title="Source Title"><a href= "#myModal21" data-toggle="modal" data-whatever="@fat">{{$post->reciever->name}} {{$post->reciever->lastname}}</a></cite></small>
                                                </blockquote>
                                                Adresa:  {{$post->reciever->country}}, {{$post->reciever->city}}  <br>
                                                {{$post->reciever->address}} {{$post->reciever->zipcode}} <br>
                                                {{$post->reciever->phone}}
                                            </strong></h6>
                                    </div>
                                </div>
                                </p>
                                <p>

                                       <div class="row">
                                        <div class="span8">
                                            <h4><strong><a href="/admin/set/{{$post->id}}"> Potvrdi {{$post->name}}</a></strong></h4>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="POST" action="/conversation/store">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$post->user->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <input type="hidden" value="{{$post->user->id}}" name="user_id" />
                            <div class="form-group">
                                <label for="content" class="form-control-label">Message:</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="POST" action="/conversation/store">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$post->reciever->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <input type="hidden" value="{{$post->reciever->id}}" name="user_id" />
                            <div class="form-group">
                                <label for="content" class="form-control-label">Message:</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @endforeach
    </div>



@endsection