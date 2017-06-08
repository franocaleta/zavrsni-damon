


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="/conversation/store">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$post->user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" value="{{$post->user->id}}" name="user_id" />
                <div class="form-group">
                    <label for="content" class="form-control-label">Message:</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>
