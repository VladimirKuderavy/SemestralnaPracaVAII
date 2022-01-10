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
        <div class="add-song-button-div">
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
                <th role="button" onclick="sortTable('songsTable', 2, true)" colspan="2" scope="col">Votes</th>
                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <th scope="col">Action</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['songs'] as $song) { ?>
                <tr>
                    <td><?=$song->getName()?></td>
                    <td><?=$song->getArtist()?></td>
                    <td><?=$song->getVotes()?></td>
                    <td>
                        <a href="?c=Songs&a=voteForSong&id=<?=$song->getId()?>">
                            <img src="public/images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </a>
                    </td>

                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <td>
                            <a href="?c=Songs&a=editSongForm&id=<?=$song->getId()?>" class="btn">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
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
