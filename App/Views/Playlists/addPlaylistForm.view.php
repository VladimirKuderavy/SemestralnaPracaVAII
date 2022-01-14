<?php
    use App\Config\Configuration;
?>

<div class="col-md-12 p-3">

    <div class="col-md-10 offset-md-1">

        <div class="div-inner padding-20">

            <h2>
                Add new playlist
            </h2>

            <hr>

            <div class="row">
                <div class="col-lg-4 padding-10 center-align">
                    <img id="image-dummy" src="<?=Configuration::DUMMY_IMAGE_PATH?>" alt="image_dummy">
                </div>

                <div class="col-lg-8">
                    <form method="post" class="text-align-center" action="?c=Playlists&a=addPlaylist" enctype="multipart/form-data">
                        <div class="padding-20">
                            <label for="inputFile" class="form-label">Playlist image</label>
                            <input class="form-control" type="file" id="inputFile" name="inputFile" onchange="imagePreview('image-dummy', this)">
                        </div>
                        <div class="padding-20">
                            <label for="playlistName" class="form-label">Playlist name</label>
                            <input type="text" class="form-control" id="playlistName" name="name" maxlength="255" required>
                        </div>
                        <div class="padding-20">
                            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>

