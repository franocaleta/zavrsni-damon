@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="jumbotron col-lg-8 col-lg-offset-2">
            <h3>Humanitarne akcije</h3></div>
        @foreach($events as $event)
            <div class="row">
                <div class="jumbotron col-lg-8 col-lg-offset-2">
                    <div class="span8">
                        <div class="row">
                            <div class="span8">
                                <h4><strong><a href="#">{{$event->name}}</a></strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2">
                                <img src="{{ URL::to('/') }}/img//{{$event->picture}}" width="400px" style="float:left" height="310px" class="img-rounded" alt="laptop">
                            </div>

                            <div class="span10">
                                <div class="span20">
                                    <h4><strong>  Opis: {{$event->description}}
                                        </strong></h4>
                                </div>
                             </div>
                        </div>



                    </div>
                    <br>
                    <a href="#pokloni{{$event->id}}"  data-toggle="modal" >Pokloni novi</a>
                    <br>
                    <a href="#pokloni2{{$event->id}}"  data-toggle="modal" >Pokloni postojeći</a>
                </div>


            </div>

            <div class="modal fade" id="pokloni2{{$event->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">

                                @foreach(\Illuminate\Support\Facades\Auth::user()->posts as $post)
                                    @if($post->status == "free")
                                    <div class="row" >
                                        <div class="col-sm-5">
                                            <div class="thumbnail">
                                                <img class="img-responsive user-photo" src="{{ URL::to('/') }}/img/{{$post->picture}}">
                                            </div><!-- /thumbnail -->
                                        </div><!-- /col-sm-1 -->

                                        <div class="col-sm-5">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    {{$post->name}}
                                                </div><!-- /panel-body -->
                                            </div><!-- /panel panel-default -->
                                        </div><!-- /col-sm-5 -->
                                        <form method="POST"  action="/events/{{$event->id}}/giveExisting/{{$post->id}}">
                                            {{ csrf_field() }}

                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-primary" >Pokloni</button>

                                            </div>
                                        </form>
                                    </div><!-- /row -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="pokloni{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <script>
                    var counter = 1;
                    var limit = 8;
                    function addInput(divName){
                        if (counter == limit)  {
                            alert("You have reached the limit of adding " + counter + " inputs");
                        }
                        else {
                            var newdiv = document.createElement('div');
                            newdiv.innerHTML = "Tag " + (counter + 1) + " <br><input type='text' name='myInputs[]'><br><br>";
                            document.getElementById(divName).appendChild(newdiv);
                            counter++;
                        }
                    }
                </script>
                <form method="post" action="/events/{{$event->id}}/give" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Stvori novi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="form-group">
                                <label for="name">Ime</label>
                                <input type="textarea" class="form-control" id="name3" name="name3">
                            </div>


                            <div class="form-group">
                                <label for="description">Opis</label>
                                <input type="textarea" class="form-control" id="description3" name="description3">
                            </div>


                            <div id="dynamicInput">
                                Tag 1<br><input type="text" name="myInputs[]"><br><br>
                            </div>

                            <input type="button" value="Dodaj novi" onClick="addInput('dynamicInput');">
                            <br>
                            <label class="btn btn-primary" for="my-file-selector3">
                                <input id="my-file-selector3" type="file" name="picture3" id="picture3" style="display:none;">
                                Odaberite sliku
                            </label>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Objavi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>



@endsection