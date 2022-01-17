<?php
    use App\SignInApp;
    /**@var Array $data*/
?>

<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">

        <h2>
            All albums
        </h2>

        <hr>

        <input type="text" id="searchInput" class="form-control form-control-lg" onkeyup="searchTable('albumsTable', 'searchInput')" placeholder="Search for album ...">

        <hr>

        <?php if (SignInApp::isUserLoggedIn()) { ?>
            <div class="add-button-div">
                <a href="?c=Albums&a=addAlbumForm" type="button" class="btn btn-labeled btn-success">
                <span class="btn-label">
                    <i class="bi bi-plus-lg"></i>
                </span> Add album
                </a>
            </div>
        <?php } ?>



        <table class="table table-hover" id="albumsTable">
            <thead>
            <tr>
                <th role="button" onclick="sortTable('albumsTable', 0)" scope="col">Album Name</th>
                <th role="button" onclick="sortTable('albumsTable', 1)" scope="col">Artist</th>
                <th role="button" onclick="sortTable('albumsTable', 2, true)" colspan="2" scope="col">Votes</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['albums'] as $album) { ?>
                <tr class="clickable-row" onclick="window.location.href='?c=Albums&a=albumDetails&id=<?=$album->getId()?>'">
                    <td><?=$album->getName()?></td>
                    <td><?=$album->getArtist()?></td>
                    <td><?=$album->getVotes()?></td>
                    <td>
                        <a href="?c=Albums&a=voteForAlgum&id=<?=$album->getId()?>" class="btn padding-off">
                            <i class="bi bi-hand-thumbs-up-fill"></i>
                        </a>
                    </td>

                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
