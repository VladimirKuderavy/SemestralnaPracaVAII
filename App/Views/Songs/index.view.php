<?php
/**@var Array $data*/

if (isset($_SESSION['message'])) {
    ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>

<?php }?>

<?php
if (isset($_SESSION['user'])) {
    ?>

    <div class="col-md-12 p-3">

        <div class="div-inner padding-20">

                <h2>
                    Add new song
                </h2>

            <hr>

            <form method="post" class="sign-in-form" action="?c=Songs&a=addSong">
                <input type="hidden" name="id">
                <div class="mb-3">
                    <label for="songName" class="form-label">Song name</label>
                    <input type="text" class="form-control" id="songName" name="name" maxlength="255" required>
                </div>
                <div class="mb-3">
                    <label for="artist" class="form-label">Artist</label>
                    <input type="text" class="form-control" id="artist" name="artist" maxlength="255" required>
                </div>
                    <button type="submit" class="btn btn-dark" name="submit">Submit</button>
            </form>
        </div>

    </div>

<?php }?>


<div class="col-md-12 p-3">
    <div class="div-inner table-responsive padding-20">

        <h2>
            All songs
        </h2>

        <hr>

        <input type="text" id="searchInput" class="form-control form-control-lg" onkeyup="searchSong()" placeholder="Search for song ...">

        <hr>

        <table class="table" id="songsTable">
            <thead>
            <tr>
                <th scope="col">Song Name</th>
                <th scope="col">Artist</th>
                <th colspan="2" scope="col">Votes</th>
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
