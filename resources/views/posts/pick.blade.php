
<form  method="POST" class ="col-md-6" action="/ajax/demand/{{$post->id}}"  id = demand{{$post->id}}  >

    {{ csrf_field() }}

    <button type="submit" class="btn btn-primary">Demand</button>

</form>

<script>

    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    jQuery( document ).ready( function( $ ) {


        $('#demand{{$post->id}}').on('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $.ajax({
                type: "POST",
                url: '/ajax/demand/{{$post->id}}',

                success: function (user) {

                    var content = "<button>" +user.name+ "<br></button>"



                    $('#pickovi{{$post->id}}2').append(content);

                    //


                }
            });
        });

    })
</script>
