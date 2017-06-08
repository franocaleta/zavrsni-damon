
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@foreach($conversation->users as $user  )
                    @if( Auth::user()->id != $user->id) {{$user->name}}@endif
                @endforeach</div>

            <div class="panel-body">
                <div class="container">
                    @foreach($conversation->messages as $message)
                        @if( Auth::user()->id == $message->user->id)
                            <div class="row message-bubble" >
                                <p class="text-muted">{{$message->user->name}}</p>
                               <div class="vrime"> <p>{{$message->created_at->diffForHumans()}}</p></div>
                                <p>{{$message->content}}</p>
                            </div>
                        @else
                            <div class="row message-bubble2">
                                <p class="text-muted">{{$message->user->name}}</p>
                                <div class="vrime"> <p>{{$message->created_at->diffForHumans()}}</p></div>
                                <p>{{$message->content}}</p>
                            </div>
                        @endif

                    @endforeach
                </div>
                <form method ="post" action="/conversation/{{$conversation->id}}/sendMessage">
                    {{ csrf_field() }}
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" name="content" id="content" class="form-control">
                        <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Send</button>
                  </span>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection