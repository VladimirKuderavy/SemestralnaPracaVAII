<?php
    use App\Config\Configuration;
    /**@var Array $data */
?>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">

        <h2>
            Your playlists
        </h2>

        <hr>

        <div class="row row-cols-1 row-cols-xxl-4 row-cols-md-3 row-cols-sm-2 g-4">
            <div class="col">
                    <div class="card h-100 text-align-center">
                        <div>
                            <a href="?c=Playlists&a=addPlaylistForm">
                                <img src="public/images/plus-lg.svg" class="card-image" alt="...">
                            </a>
                        </div>

                        <div class="text-align-center padding-20">
                            <h5>Add new playlist</h5>
                        </div>
                    </div>
            </div>

            <?php foreach ($data['playlists'] as $playlist) { ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="text-align-center">
                            <img src="<?=$playlist->tryGetImagePath()?>" class="padding-20 card-image" alt="...">

                            <h5><?=$playlist->getName()?></h5>
                        </div>

                        <div class="text-align-center padding-20">


                            <div class="row">
                                <div class="col-6 text-align-center">
                                    <a href="?c=Playlists&a=editPlaylistForm&id=<?=$playlist->getId()?>" class="btn">
                                        <i class="bi bi-pencil-fill bi-pencil-fill-xlg"></i>
                                    </a>
                                </div>
                                <div class="col-6 text-align-center">
                                    <a href="c=Playlists&a=deletePlaylist&id=<?=$playlist->getId()?>" class="btn">
                                        <i class="bi bi-trash-fill bi-trash-fill-xlg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

