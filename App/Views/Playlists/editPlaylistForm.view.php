<?php
    use App\SignInApp;
    /**@var Array $data */
    $playlist = $data['playlist'];
?>

<div class="col-md-12 p-3">

    <div class="div-inner padding-20">

        <h2>
            Edit Playlist
        </h2>

        <hr>

        <div class="row">
            <div class="col-lg-4 padding-10 center-align">
                <div class="text-align-center">
                    <img id="image-dummy" src="<?=$playlist->tryGetImagePath()?>" alt="image_dummy">
                </div>
            </div>

            <div class="col-lg-8">
                <form method="post" class="text-align-center" action="?c=Playlists&a=addPlaylist" enctype="multipart/form-data">
                    <div class="padding-20">
                        <label for="inputFile" class="form-label">Playlist image</label>
                        <input class="form-control" type="file" id="inputFile" name="inputFile" onchange="imagePreview('image-dummy', this)">
                    </div>
                    <div class="padding-20">
                        <label for="playlistName" class="form-label">Playlist name</label>
                        <input type="text" class="form-control" id="playlistName" value="<?=$playlist->getName()?>" name="name" maxlength="255" required>
                    </div>
                    <div class="padding-20">
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">

        <h2>
            Songs in playlist
        </h2>

        <hr>

        <input type="text" id="searchInput" class="form-control form-control-lg" onkeyup="searchTable('songsTable', 'searchInput')" placeholder="Search for song ...">

        <hr>

        <?php if (SignInApp::isUserLoggedIn()) { ?>
            <div class="add-button-div">
                <a href="?c=Songs&a=addSongForm" type="button" class="btn btn-labeled btn-success">
                <span class="btn-label">
                    <i class="bi bi-plus-lg"></i>
                </span> Add song
                </a>
            </div>
        <?php } ?>



        <table class="table" id="songsTable">
            <thead>
            <tr>
                <th role="button" onclick="sortTable('songsTable', 0)" scope="col">Song Name</th>
                <th role="button" onclick="sortTable('songsTable', 1)" scope="col">Artist</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['playlist_songs'] as $song) { ?>
                <tr>
                    <td><?=$song->getName()?></td>
                    <td><?=$song->getArtist()?></td>

                    <?php
                    if (SignInApp::isUserLoggedIn()) {
                        ?>
                        <td>
                            <a href="?c=Songs&a=deleteSong&id=<?=$song->getId()?>" class="btn">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    <?php } ?>

                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
