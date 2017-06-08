<html><head></head>
<h1 id="mackica">Create a Post</h1>

<div id="posts" class="col-sm-8 blog-main">
    @foreach($posts as $post)
        {{$post->name}}
        <br>
        <p>{{$post->picture}}</p>
        <hr>
        <hr>
        <br>
        <div id="comment{{$post->id}}">
            @foreach($post->comments as $comment)
               <p>
                   {{$comment->user->name}}<br>
                   {{$comment->content}}
               </p>
            @endforeach
        </div>
        <textarea name="content" id="content{{$post->id}}" class="form-control" placeholder="leave comment" ></textarea>
        <button class="comment-button" id ="{{$post->id}}">Comment</button>
    @endforeach
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="/js/komentari.js" type="text/javascript"></script>


</html>