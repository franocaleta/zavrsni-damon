

<div class="modal modal fade" id="portfolioModal1{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="modal-body">

                            <h2><strong>{{$post->name}} </strong>

                                <button type="button" class="close btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">X</button>
                            </h2>
                            <img src="{{ URL::to('/') }}/img/{{($post->picture)}}" class="img-responsive img-rounded img-centered" alt="">
                            <p>{{$post->created_at->diffForHumans()}}</p>
                            <hr>
                        </div>
                        <blockquote>
                            <p>
                               {{$post->description}}
                            </p>
                            <small><cite title="Source Title"><a href= "#myModal2" data-toggle="modal" data-whatever="@fat">{{$post->user->name}} {{$post->user->lastname}}</a></cite></small>
                        </blockquote>
                        <ul class="list-inline item-details">
                            @foreach($post->tags as $tag)
                            <li>
                                <strong><a href="http://startbootstrap.com"><span class="label label-info">{{$tag->name}}</span></a>
                                </strong>
                            </li>
                                @endforeach
                        </ul>
                        <a href="/posts/{{$post->id}}/demand" class="btn btn-primary">Zatraži</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Izađi</button>
                        <p> Kandidati:
                        @foreach($post->candidates as $candidate)
                                <small><cite title="Source Title">{{$post->user->name}} {{$post->user->lastname}}</cite></small>
                            @endforeach
                        </p>
                        @include('secondpage.postKomentari')
                        <ul class="pager">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<div class="modal fade" id="zatrazi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" href="portfolioModal1"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

