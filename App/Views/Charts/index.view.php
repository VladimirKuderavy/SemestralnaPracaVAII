<div class="col-md-12 p-3">
    <div class="div-inner">

        <div class="number-one-caption-padding">
            <h2>1# Album this week</h2>
            <hr>
        </div>

        <div class="row margin-off number-one-padding">
            <div class="col-sm-2 padding-off">
                <img class="number-one-image" src="public/images/sleepy-hallow-still-sleep.jpg" alt="sleepy hallow still sleep">
            </div>

            <div class="col-sm-10 center-align">
                <h3>Sleepy Hallow - Still Sleep ?</h3>
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
            <tr>
                <th scope="row">1</th>
                <td>Still Sleep?</td>
                <td>Sleepy Hallow</td>
                <td>4001</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Certified Lover Boy</td>
                <td>Drake</td>
                <td>3214</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Sour</td>
                <td>Olivia Rodrigo</td>
                <td>2844</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Shoot for the Stars Aim for the Moon</td>
                <td>Pop Smoke</td>
                <td>2631</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Astroworld</td>
                <td>Travis Scott</td>
                <td>2247</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>good kid, m.A.A.d city</td>
                <td>Kendrick Lamar</td>
                <td>1935</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Starboy</td>
                <td>The Weeknd</td>
                <td>1610</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Nevermind</td>
                <td>Nirvana</td>
                <td>1578</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">9</th>
                <td>Faith</td>
                <td>Pop Smoke</td>
                <td>1196</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
            <tr>
                <th scope="row">10</th>
                <td>Expensive Pain</td>
                <td>Meek Mill</td>
                <td>1014</td>
                <td>
                    <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                </td>
            </tr>
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
                <img class="number-one-image" src="public/images/pop-smoke-dior.jpg" alt="pop smoke dior">
            </div>

            <div class="col-sm-10 center-align">
                <h3>Pop Smoke - Dior</h3>
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
            foreach ($data['top_songs'] as $song) { ?>
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