<?php
    use App\Config\Configuration;
    /**@var Array $data */
    $top_songs = $data['top_songs'];
    $top_albums = $data['top_albums'];
?>

<div class="col-md-12 p-3">
    <div class="div-inner">

        <div class="number-one-caption-padding">
            <h2>1# Album this week</h2>
            <hr>
        </div>

        <div class="row margin-off number-one-padding">
            <div class="col-sm-2 padding-off">
                <img class="number-one-image" src="<?=$top_albums[0]->tryGetCoverPath()?>" alt="album cover">
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

        <table class="table table-hover">
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
                <tr class="clickable-row" onclick="window.location.href='?c=Albums&a=albumDetails&id=<?=$album->getId()?>'">
                    <th scope="row"><?= $i ?></th>
                    <td><?=$album->getName()?></td>
                    <td><?=$album->getArtist()?></td>
                    <td><?=$album->getVotes()?></td>
                    <td>
                        <a href="?c=Charts&a=voteForAlbum&id=<?=$album->getId()?>" class="btn padding-off">
                            <i class="bi bi-hand-thumbs-up-fill"></i>
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
                <img class="number-one-image" src="<?=$top_songs[0]->tryGetCoverPath()?>" alt="song cover">
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

        <table class="table table-hover">
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
                <tr class="clickable-row" onclick="window.location.href='?c=Songs&a=songDetails&id=<?=$song->getId()?>'">
                    <th scope="row"><?= $i ?></th>
                    <td><?=$song->getName()?></td>
                    <td><?=$song->getArtist()?></td>
                    <td><?=$song->getVotes()?></td>
                    <td>
                        <a href="?c=Charts&a=voteForSong&id=<?=$song->getId()?>" class="btn padding-off">
                            <i class="bi bi-hand-thumbs-up-fill"></i>
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