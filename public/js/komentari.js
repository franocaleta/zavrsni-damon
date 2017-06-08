$(document).ready(function(){
    // set up jQuery with the CSRF token, or else post routes will fail
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // handlers
    function onPostClick(event)
    {
        var postId = event.target.id;
        var content = $('#content'+postId).val();
        // we're passing data with the post route, as this is more normal
        $.get('/ajax/comment/'+postId, {content:content}, onSuccess);
        $('#content'+postId).val('');
    }

    function onSuccess(data, status, xhr)
    {
        // with our success handler, we're just logging the data...
        //   console.log(data, status, xhr);
        // but you can do something with it if you like - the JSON is deserialised into an object
        // console.log(String(data.value).toUpperCase())

        var imgSrc = data.user.profilePic != null ? '/img/profile/'+data.user.profilePic : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png';

        var opening = '<div class="col-sm-12">';
        var imageDivs = '<div class="col-sm-1"> <div class="thumbnail">';
        var imageEl = '<img class="img-responsive user-photo" src="'+ imgSrc +'">';
        var imageClosing = '</div></div>';

        var contentDivs = '<div class="col-sm-5"<div class="panel panel-default">';
        var content =
            '<div class="panel-heading"> ' +
                '<strong> ' + data.user.name + ' ' + data.user.lastname + '</strong>' +
                '<span class="text-muted"> Upravo sada</span> ' +
            '</div> ' +
            '<div class="panel-body">'
                + data.comment.content +
            '</div>';
        var closing = '</div>'
        var postId = data.comment.post_id;
        $('#comments'+postId).append(opening+imageDivs+imageEl+imageClosing+contentDivs+content+imageClosing+closing);
    }

    // listeners
    $('.comment-button').on('click', onPostClick);

});


