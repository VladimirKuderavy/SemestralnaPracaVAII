<?php
    use App\Config\Configuration;
    /**@var Array $data */
    $top_songs = $data['top_songs'];
    $top_albums = $data['top_albums'];
    $album_cover = Configuration::COVER_IMAGE_PATH.$top_albums[0]->getCover();
    if ($top_albums[0]->getCover() == null) {
        $album_cover = "public/images/image_dummy.svg";
    }
    $song_cover = Configuration::COVER_IMAGE_PATH.$top_songs[0]->getCover();
    if ($top_songs[0]->getCover() == null) {
        $song_cover = "public/images/image_dummy.svg";
    }

?>

<div class="col-md-12 p-3">
    <div class="div-inner">

        <div class="number-one-caption-padding">
            <h2>1# Album this week</h2>
            <hr>
        </div>

        <div class="row margin-off number-one-padding">
            <div class="col-sm-2 padding-off">
                <img class="number-one-image" src="<?=$album_cover?>" alt="album cover">
            </div>

            <div class="col-sm-10 center-align">
                <h3><?=$top_albums[0]->getArtist()?> - <?=$top_albums[0]->getName()?></h3>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">
        <h2>
            TOP 10 Albums
        </h2>

        <hr>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Album Name</th>
                <th scope="col">Artist</th>
                <th colspan="2" scope="col">Votes</th>
            </tr>
            </thead>
            <tbody class="tbody-chart">

            <?php
            $i = 1;
            foreach ($top_albums as $album) { ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?=$album->getName()?></td>
                    <td><?=$album->getArtist()?></td>
                    <td><?=$album->getVotes()?></td>
                    <td>
                        <a href="?c=Charts&a=voteForAlbum&id=<?=$album->getId()?>">
                            <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>

            </tbody>

        </table>
    </div>
</div>

<div class="col-md-12 p-3">
    <div class="div-inner">

        <div class="number-one-caption-padding">
            <h2>1# Song this week</h2>
            <hr>
        </div>

        <div class="row margin-off number-one-padding">
            <div class="col-sm-2 padding-off">
                <img class="number-one-image" src="<?=$song_cover?>" alt="song cover">
            </div>

            <div class="col-sm-10 center-align">
                <h3><?=$top_songs[0]->getArtist()?> - <?=$top_songs[0]->getName()?></h3>
            </div>
        </div>

    </div>
</div>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">
        <h2>
            TOP 10 Songs
        </h2>

        <hr>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Song Name</th>
                <th scope="col">Artist</th>
                <th colspan="2" scope="col">Votes</th>
            </tr>
            </thead>
            <tbody class="tbody-chart">

            <?php
            $i = 1;
            foreach ($top_songs as $song) { ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?=$song->getName()?></td>
                    <td><?=$song->getArtist()?></td>
                    <td><?=$song->getVotes()?></td>
                    <td>
                        <a href="?c=Charts&a=voteForSong&id=<?=$song->getId()?>">
                            <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>

            </tbody>

        </table>
    </div>
</div>