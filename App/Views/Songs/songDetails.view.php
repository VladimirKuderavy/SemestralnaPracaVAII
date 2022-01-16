<?php
    use App\Config\Configuration;
    /**@var Array $data */
    $song = $data['song'];
?>

<div class="col-md-12 p-3">

    <div class="col-md-10 offset-md-1">

        <div class="div-inner padding-20">

            <h2>
                Song details
            </h2>

            <hr>

            <div class="row">
                <div class="col-lg-4 padding-10 center-align">
                    <div class="text-align-center">
                        <img id="image-dummy" src="<?=$song->tryGetCoverPath()?>" alt="image_dummy">
                    </div>
                </div>

                <div class="col-lg-8 padding-10 text-align-center">
                    <div class="row">

                        <?php if(\App\SignInApp::isUserLoggedIn()) { ?>

                            <div class="col-lg-8">
                                <label for="song" class="form-label">Song name</label>
                                <h3 id="song"><?=$song->getName()?></h3>

                                <label for="artist" class="form-label">Artist</label>
                                <h3 id="artist"><?=$song->getArtist()?></h3>

                                <label for="votes" class="form-label">Votes</label>
                                <h3 id="votes"><?=$song->getVotes()?></h3>
                            </div>

                            <div class="col-lg-4">

                                <div class="row">
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Songs&a=editSongForm&id=<?=$song->getId()?>" class="btn">
                                            <i class="bi bi-pencil-fill bi-pencil-fill-xxlg"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Songs&a=deleteSong&id=<?=$song->getId()?>" class="btn">
                                            <i class="bi bi-trash-fill bi-trash-fill-xxlg"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Songs&a=songDetailsVoteForSong&id=<?=$song->getId()?>" class="btn">
                                            <i class="bi bi-hand-thumbs-up-fill bi-hand-thumbs-up-fill-xxlg"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        <?php } else { ?>
                            <div class="col-lg-8 offset-lg-2">
                                <label for="song" class="form-label">Song name</label>
                                <h3 id="song"><?=$song->getName()?></h3>

                                <label for="artist" class="form-label">Artist</label>
                                <h3 id="artist"><?=$song->getArtist()?></h3>

                                <label for="votes" class="form-label">Votes</label>
                                <h3 id="votes"><?=$song->getVotes()?></h3>
                            </div>
                            <div class="col-lg-1 center-align">
                                <a href="?c=Songs&a=songDetailsVoteForSong&id=<?=$song->getId()?>" class="btn">
                                    <i class="bi bi-hand-thumbs-up-fill bi-hand-thumbs-up-fill-xxlg"></i>
                                </a>
                            </div>
                        <?php } ?>

                    </div>

                </div>

                <?php if(\App\SignInApp::isUserLoggedIn()) { ?>

                    <div class="center-align">
                        <div class="dropdown padding-20">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Add to Playlist
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php foreach ($data['playlists'] as $playlist) { ?>
                                    <li>
                                        <a class="dropdown-item" href="?c=Songs&a=addSongToPlaylist&playlist_id=<?=$playlist->getId()?>&song_id=<?=$song->getId()?>">
                                            <?=$playlist->getName()?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

