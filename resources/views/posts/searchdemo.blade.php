<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.3 - laravel scout algolia search example</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Laravel Full Text Search using Scout and algolia</h2><br/>


        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="{{ old('title') }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button class="btn btn-success">Create New Item</button>
                </div>
            </div>
        </div>
    </form>

    <div class="panel panel-primary">
        <div class="panel-heading">Item management</div>
        <div class="panel-body">
            <form method="POST" action="{{ route('posts-lists') }}">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="titlesearch" class="form-control" placeholder="Enter Title For Search" value="{{ old('titlesearch') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Creation Date</th>
                <th>Updated Date</th>
                </thead>
                <tbody>
                @if(is_null($posts))
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @else
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->name}}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            @foreach($post->tags as $tag)
                                <td>{{ $tag->name }}</td>
                                @endforeach
                        </tr>
                    @endforeach

                @endif

                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>