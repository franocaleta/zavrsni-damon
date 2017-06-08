@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default col-lg-10 col-lg-offset-1">
                <div class="panel-body">
                    <h4 style="text-align: center;">Profil korisnika</h4>
                    <hr>
                        <form class="form-horizontal" method="post" action="/editProfile/{{Auth()->user()->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-4 col-lg-offset-4">
                                    <div class="text-center">
                                        @if(is_null(Auth()->user()->profilePic))

                                            <img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="200px" height="auto" class="avatar img-circle" alt="avatar" style="padding-bottom: 3px">
                                        @else
                                            <img src="{{ URL::to('/') }}/img/profile/{{($user->profilePic)}}" width="200px" height="auto" class="avatar img-circle" alt="avatar" style="padding-bottom: 3px">
                                        @endif
                                            <label class="btn btn-primary" for="my-file-selector">
                                                <input id="my-file-selector" type="file" name="picture" id="picture" style="display:none;">
                                                Odaberite novu sliku
                                            </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" value="{{Auth()->user()->email}}" name="email" placeholder="{{Auth()->user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Zaporka</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Unesi zaporku">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Potvrdi zaporku</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Unesi ponovno">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row col-lg-offset-2">
                                    <div class="col-md-3">
                                        <select class="form-control" id="select" name="country">
                                            <option>Hrvatska</option>
                                            <option>Bosna i Hercegovina</option>
                                            <option>Slovenija</option>
                                            <option>Srbija</option>
                                            <option>Crna Gora</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="city" id="inputEmail" value="{{Auth()->user()->city}}" placeholder="{{Auth()->user()->city}}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="address" value="{{Auth()->user()->address}}" id="inputEmail" placeholder="{{Auth()->user()->address}}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="zipcode" id="inputEmail" value="{{Auth()->user()->zipcode}}" placeholder="{{Auth()->user()->zipcode}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputZip" class="col-lg-2 control-label">Broj mobitela</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="phone" id="inputEmail" value="{{Auth()->user()->phone}}" placeholder="{{Auth()->user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">O meni</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" name="aboutMe" value="{{Auth()->user()->about_me}}" id="textArea">{{Auth()->user()->about_me}}</textarea>
                                </div>
                            </div>
                            <div class = "form-group">
                                <button type="submit" class="btn btn-primary">Uredi</button>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection