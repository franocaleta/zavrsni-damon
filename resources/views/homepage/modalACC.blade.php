<div class="modalACC">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Moj Profil</h4>
                </div>
                <div class="modal-body">
                    <center>
                        @if(is_null(Auth()->user()->profilePic))
                            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>

                        @else
                            <img src="{{ URL::to('/') }}/img/profile/{{(Auth()->user()->profilePic)}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>

                        @endif
                        <h3 class="media-heading">{{Auth()->user()->name}} {{Auth()->user()->lastname}} <small>{{Auth()->user()->country}},{{Auth()->user()->city}} </small></h3>
                        <span><strong>Trofeji: </strong></span>
                        @foreach( Auth()->user()->trophies as $trophy)
                            //trofeji
                            @endforeach
                        <span class="label label-warning">HTML5/CSS</span>
                        <span class="label label-info">Adobe CS 5.5</span>
                        <span class="label label-info">Microsoft Office</span>
                        <span class="label label-success">Windows XP, Vista, 7</span>
                    </center>
                    <hr>
                    <center>
                        <p class="text-left"><strong>O meni: </strong><br>
                            @if(is_null(Auth()->user()->about_me))
                                Prazno

                            @else
                            {{Auth()->user()->about_me}}
                            @endif
                        <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <a href="/profil/{{\Illuminate\Support\Facades\Auth::user()->id}}" class="btn btn-default">Uredi</a>

                        @if(  (\Illuminate\Support\Facades\Auth::user()->posts->count()) == 0  )
                             <a href="#myModal4" class="btn btn-default" data-toggle="modal" >Objavi novi</a>
                        @else
                            <a href="/posts/{{\Illuminate\Support\Facades\Auth::user()->id}}" class="btn btn-default">Moji Postovi</a>
                        @endif
                        <a href="/posts/{{\Illuminate\Support\Facades\Auth::user()->id}}/recieved" class="btn btn-default">Primljeni</a>


                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
