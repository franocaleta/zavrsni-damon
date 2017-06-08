<div class="modalREGISTER">

    <div class="modal fade" id="myModalREGISTER" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">






                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ime</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-4 control-label">Prezime</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Lozinka</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Ponovljena lozinka</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Država</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Adresa</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="zipcode" class="col-md-4 control-label">Poštanski broj</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">Grad</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Broj mobitela</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registriraj se
                                </button>
                            </div>
                        </div>
                    </form>
                </div>





            </div>
        </div>
    </div>

</div>