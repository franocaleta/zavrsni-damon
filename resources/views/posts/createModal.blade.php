
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
<!-- Modal -->

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="/posts" enctype="multipart/form-data">
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
                    <input type="textarea" class="form-control" id="name" name="name">
                </div>


                <div class="form-group">
                    <label for="description">Opis</label>
                    <input type="textarea" class="form-control" id="description" name="description">
                </div>


                <div id="dynamicInput2">
                    Tag 1<br><input type="text" name="myInputs[]"><br><br>
                </div>

                <input type="button" value="Dodaj novi" onClick="addInput('dynamicInput2');">
                <br>
                <label class="btn btn-primary" for="my-file-selector">
                    <input id="my-file-selector" type="file" name="picture" id="picture" style="display:none;">
                    Odaberite sliku
                </label>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Objavi</button>
                </div>
            </div>
        </div>
    </form>
</div>