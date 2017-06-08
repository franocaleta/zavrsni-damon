@if(is_null($post->candidates))
@else
    @foreach($post->candidates as $candidate)
        <div id="pickovi{{$post->id}}"></div>
        <button id ="pick{{$candidate->id}}">Pick {{$candidate->name}}</button>
        <div id="pickovi{{$post->id}}2"></div>

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>" />

        <script>
            // set up jQuery with the CSRF token, or else post routes will fail
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            // handlers

            function onPostClick(event)
            {
                // we're passing data with the post route, as this is more normal
                $.post('/ajax/post', {content:'hello'}, onSuccess);

                var content = $('#pick{{$candidate->id}}').val();

            }
            function onSuccess(data, status, xhr)
            {
                // with our success handler, we're just logging the data...
                console.log(data, status, xhr);
                // but you can do something with it if you like - the JSON is deserialised into an object
                console.log(String(data.value).toUpperCase())
                $('button#pickovi{{$post->id}}').hide();

            }
            // listeners

            $('button#pick<?php echo e($candidate->id); ?>').on('click', onPostClick);
        </script>



    @endforeach
@endif