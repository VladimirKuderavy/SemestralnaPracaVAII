<?php
    use App\Config\Configuration;
    /**@var Array $data */
    $song = $data['song'];
?>

<div class="col-md-12 p-3">

    <div class="col-md-10 offset-md-1">

        <div class="div-inner padding-20">

            <h2>
                Edit song
            </h2>

            <hr>

            <div class="row">
                <div class="col-lg-4 padding-10 center-align">
                    <div class="text-align-center">
                        <img id="image-dummy" src="<?=$song->tryGetCoverPath()?>" alt="image_dummy">
                    </div>
                </div>

                <div class="col-lg-8">
                    <form method="post" class="text-align-center" action="?c=Songs&a=editSong" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$song->getId()?>">
                        <div class="padding-20">
                            <label for="inputFile" class="form-label">Song cover</label>
                            <input class="form-control" type="file" id="inputFile" name="inputFile" onchange="imagePreview('image-dummy', this)">
                        </div>
                        <div class="padding-20">
                            <label for="songName" class="form-label">Song name</label>
                            <input type="text" class="form-control" id="songName" name="name" value="<?=$song->getName()?>" maxlength="255" required>
                        </div>
                        <div class="padding-20">
                            <label for="artist" class="form-label">Artist</label>
                            <input type="text" class="form-control" id="artist" name="artist" value="<?=$song->getArtist()?>" maxlength="255" required>
                        </div>
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>

