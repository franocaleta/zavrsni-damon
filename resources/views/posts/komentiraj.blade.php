<script>
    // set up jQuery with the CSRF token, or else post routes will fail
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    // handlers

    function onPostClick(event)
    {
        var content = $('#content{{$post->id}}').val();
        // we're passing data with the post route, as this is more normal
        $.post('/ajax/comment/{{$post->id}}', {content:content}, onSuccess);


    }
    function onSuccess(data, status, xhr)
    {
        // with our success handler, we're just logging the data...
        //   console.log(data, status, xhr);
        // but you can do something with it if you like - the JSON is deserialised into an object
        // console.log(String(data.value).toUpperCase())
        var content = "<p>Frano<br>"+data.content+"</p>";
        var e = $('#{{$post->id}}').html();
        console.log(e);
        $('#kom{{$post->id}}').append(content);

        e = $('#kom{{$post->id}}').html();
        console.log(e);

        $('#content{{$post->id}}').val('');

    }
    // listeners

    $('#comment<?php echo e($post->id); ?>').on('click', onPostClick);
</script>