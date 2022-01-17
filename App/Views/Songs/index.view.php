<?php
use App\SignInApp;
/**@var Array $data*/
?>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">

        <h2>
            All songs
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



        <table class="table table-hover" id="songsTable">
            <thead>
            <tr>
                <th role="button" onclick="sortTable('songsTable', 0)" scope="col">Song Name</th>
                <th role="button" onclick="sortTable('songsTable', 1)" scope="col">Artist</th>
                <th role="button" onclick="sortTable('songsTable', 2, true)" colspan="2" scope="col">Votes</th>
            </tr>
            </thead>
            <tbody>

                <?php
                foreach ($data['songs'] as $song) { ?>
                    <tr class="clickable-row" onclick="window.location.href='?c=Songs&a=songDetails&id=<?=$song->getId()?>'">
                        <td><?=$song->getName()?></td>
                        <td><?=$song->getArtist()?></td>
                        <td class="song-like-count" data-id="<?=$song->getId()?>"><?=$song->getVotes()?></td>
                        <td>
                            <button type="button" class="btn padding-off like-button" data-type="song" data-id="<?=$song->getId()?>">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                            </button>
                        </td>
                    </tr>
                <?php }?>

            </tbody>
        </table>
    </div>
</div>
