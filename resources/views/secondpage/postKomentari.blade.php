<style>
    .komentariPost .thumbnail {
        padding:0px;
    }
    .komentariPost .panel {
        position:relative;
    }
    .komentariPost .panel>.panel-heading:after,.panel>.panel-heading:before{
        position:absolute;
        top:11px;left:-16px;
        right:100%;
        width:0;
        height:0;
        display:block;
        content:" ";
        border-color:transparent;
        border-style:solid solid outset;
        pointer-events:none;
    }
    .komentariPost .panel>.panel-heading:after{
        border-width:7px;
        border-right-color:#f7f7f7;
        margin-top:1px;
        margin-left:2px;
    }
    .komentariPost .panel>.panel-heading:before{
        border-right-color:#ddd;
        border-width:8px;
    }
</style>

<div class="container komentariPost">
    <div class="row">
        <div class="col-sm-12">
            <h3>Komentari</h3>
        </div><!-- /col-sm-12 -->
    </div><!-- /row -->

    <div class="row">

        <div class="col-sm-5">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>{{Auth::user()->name}}</strong>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label" for="inputDefault">Komentiraj</label>
                        <input type="text" class="form-control" id="content{{$post->id}}" name="content">
                    </div>

                </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->

        </div><!-- /col-sm-5 -->
        <div class="col-sm-1">
            <button type="submit" class="comment-button" id="{{$post->id}}"  >Komentiraj</button>
        </div>
    </div><!-- /row -->

    <div class="row" id="comments{{$post->id}}">
        @foreach($post->comments as $comment)
            <div class="col-sm-12">
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
                            <strong>{{$comment->user->name}} {{$comment->user->lastname}}</strong>
                            <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="panel-body">
                            {{$comment->content}}
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
            </div>
        @endforeach

    </div><!-- /row -->
</div><!-- /container -->



