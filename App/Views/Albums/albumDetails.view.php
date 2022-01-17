<?php
use App\Config\Configuration;
/**@var Array $data */
$album = $data['album'];
?>

<div class="col-md-12 p-3">

    <div class="col-md-10 offset-md-1">

        <div class="div-inner padding-20">

            <h2>
                Album details
            </h2>

            <hr>

            <div class="row">
                <div class="col-lg-4 padding-10 center-align">
                    <div class="text-align-center">
                        <img id="image-dummy" src="<?=$album->tryGetCoverPath()?>" alt="image_dummy">
                    </div>
                </div>

                <div class="col-lg-8 padding-10 text-align-center">
                    <div class="row">

                        <?php if(\App\SignInApp::isUserLoggedIn()) { ?>

                            <div class="col-lg-8">
                                <label for="album" class="form-label">Album name</label>
                                <h3 id="album"><?=$album->getName()?></h3>

                                <label for="artist" class="form-label">Artist</label>
                                <h3 id="artist"><?=$album->getArtist()?></h3>

                                <label for="votes" class="form-label">Votes</label>
                                <h3 id="votes"><?=$album->getVotes()?></h3>
                            </div>

                            <div class="col-lg-4">

                                <div class="row">
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Albums&a=editAlbumForm&id=<?=$album->getId()?>" class="btn">
                                            <i class="bi bi-pencil-fill bi-pencil-fill-xxlg"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Albums&a=deleteAlbum&id=<?=$album->getId()?>" class="btn">
                                            <i class="bi bi-trash-fill bi-trash-fill-xxlg"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-lg-12 padding-20 text-align-center">
                                        <a href="?c=Albums&a=albumDetailsVoteForAlbum&id=<?=$album->getId()?>" class="btn">
                                            <i class="bi bi-hand-thumbs-up-fill bi-hand-thumbs-up-fill-xxlg"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        <?php } else { ?>
                            <div class="col-lg-8 offset-lg-2">
                                <label for="album" class="form-label">Song name</label>
                                <h3 id="album"><?=$album->getName()?></h3>

                                <label for="artist" class="form-label">Artist</label>
                                <h3 id="artist"><?=$album->getArtist()?></h3>

                                <label for="votes" class="form-label">Votes</label>
                                <h3 id="votes"><?=$album->getVotes()?></h3>
                            </div>
                            <div class="col-lg-1 center-align">
                                <a href="?c=Albums&a=albumDetailsVoteForAlbum&id=<?=$album->getId()?>" class="btn">
                                    <i class="bi bi-hand-thumbs-up-fill bi-hand-thumbs-up-fill-xxlg"></i>
                                </a>
                            </div>
                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

