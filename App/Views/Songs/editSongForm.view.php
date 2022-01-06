<?php
/**@var Array $data*/
?>

<?php
if (isset($_SESSION['user'])) {
    ?>

    <div class="col-md-12 p-3">

        <div class="div-inner padding-20">

                <h2>
                    Update song
                </h2>

            <hr>

            <form method="post" class="sign-in-form" action="?c=Songs&a=editSong">
                <input type="hidden" name="id" value="<?=$data['id']?>">
                <div class="mb-3">
                    <label for="songName" class="form-label">Song name</label>
                    <input type="text" class="form-control" id="songName" name="name" value="<?=$data['name']?>" maxlength="255" required>
                </div>
                <div class="mb-3">
                    <label for="artist" class="form-label">Artist</label>
                    <input type="text" class="form-control" id="artist" name="artist" value="<?=$data['artist']?>" maxlength="255" required>
                </div>

                <button type="submit" class="btn btn-dark" name="update">Update</button>

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

        <input type="text" id="searchInput" class="form-control form-control-lg" onkeyup="searchTable()" placeholder="Search for song ...">

        <hr>

        <table class="table" id="songsTable">
            <thead>
            <tr>
                <th scope="col">Song Name</th>
                <th scope="col">Artist</th>
                <th scope="col">Votes</th>
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
