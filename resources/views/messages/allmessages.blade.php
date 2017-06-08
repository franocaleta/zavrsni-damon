<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="container">
    <div class="row">

        <section class="content">
            <h1>Razgovori</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">

                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                @if(count(Auth()->user()->conversations) == 0) <h1> Nemate razgovora</h1>@endif
                                @foreach( Auth()->user()->conversations as $conversation)
                                <tr data-status="pagado">
                                    <td>
                                        <div class="ckbox">

                                        </div>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="media">
                                            <a href="/conversation/{{$conversation->id}}" class="pull-left">
                                                @foreach($conversation->users as $user  )
                                                    @if( Auth::user()->id != $user->id)
                                                        @if(is_null($user->profilePic))

                                                                <div class="thumbnail">
                                                                    <img class="img-responsive user-photo" width="100px" height="100px" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                                                </div><!-- /thumbnail -->

                                                           @else
                                                            <div class="thumbnail">
                                                                <img class="img-responsive user-photo" width="100px" height="100px" src="{{ URL::to('/') }}/img/profile/{{($user->profilePic)}}">
                                                            </div><!-- /thumbnail -->
                                                            @endif
                                                    @endif
                                                @endforeach

                                            </a>
                                            <div class="media-body">
                                                <span class="media-meta pull-right">{{$conversation->updated_at->diffForHumans()}}</span>
                                                <h4 class="title">
                                                    @foreach($conversation->users as $user  )
                                                        @if( Auth::user()->id != $user->id) {{$user->name}}@endif
                                                    @endforeach
                                                    <span class="pull-right pagado"></span>
                                                </h4>
                                                <p class="summary">
                                                    @foreach($conversation->messages as $i => $item)
                                                        @if($i == (count($conversation->messages)-1)) {{$item->content}} @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="content-footer">
                    <p>
                        TODO
                    </p>
                </div>
            </div>
        </section>

    </div>
</div>
</div>