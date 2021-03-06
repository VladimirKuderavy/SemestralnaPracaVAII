<div class="col-md-12 p-3">

    <div class="col-md-10 offset-md-1">

        <div class="div-inner padding-20">

            <h2>
                Add new album
            </h2>

            <hr>

            <div class="row">
                <div class="col-lg-4 padding-10 center-align">
                    <img id="image-dummy" src="public/images/image_dummy.svg" alt="image_dummy">
                </div>

                <div class="col-lg-8">
                    <form method="post" class="text-align-center" action="?c=Albums&a=addAlbum" enctype="multipart/form-data">
                        <div class="padding-20">
                            <label for="inputFile" class="form-label">Album cover</label>
                            <input class="form-control" type="file" id="inputFile" name="inputFile" onchange="imagePreview('image-dummy', this)">
                        </div>
                        <div class="padding-20">
                            <label for="songName" class="form-label">Album name</label>
                            <input type="text" class="form-control" id="songName" name="name" maxlength="255" required>
                        </div>
                        <div class="padding-20">
                            <label for="artist" class="form-label">Artist</label>
                            <input type="text" class="form-control" id="artist" name="artist" maxlength="255" required>
                        </div>
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>

