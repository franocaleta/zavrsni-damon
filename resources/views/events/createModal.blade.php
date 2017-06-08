
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

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="/events" enctype="multipart/form-data">
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
                    <input type="textarea" class="form-control" id="name2" name="name2">
                </div>


                <div class="form-group">
                    <label for="description">Opis</label>
                    <input type="textarea" class="form-control" id="description2" name="description2">
                </div>

                <div class="form-group">
                    <label for="address">Država</label>

                    <input id="address" type="text" class="form-control" name="country2" required>
                </div>

                <div class="form-group">
                    <label for="address">Grad</label>

                    <input id="address" type="text" class="form-control" name="city2" required>
                </div>

                <div class="form-group">
                    <label for="address">Adresa</label>

                    <input id="address" type="text" class="form-control" name="address2" required>
                </div>

                <div class="form-group">
                    <label for="address">Poštanski broj</label>

                    <input id="address" type="text" class="form-control" name="zipcode2" required>
                </div>


                <br>
                <label class="btn btn-primary" for="my-file-selector2">
                    <input id="my-file-selector2" type="file" name="picture2" id="picture2" style="display:none;">
                    Odaberite sliku
                </label>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Objavi</button>
                </div>
            </div>
        </div>
    </form>
</div>
