<?php
require '..\php\SongsApp.php';

$app = new SongsApp();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/style.css">

    <meta charset="UTF-8">
    <title>Songs | Music Charts</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid margin-basic">

            <a href="index.php">
                <img id="logo" src="../images/logo.svg" alt="logo">
            </a>

            <button class="navbar-toggler margin-right" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="songs.php">Songs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/albums.html">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/charts.html">Charts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html/about.html">About</a>
                    </li>
                </ul>

                <?php
                if (!isset($_SESSION['user'])) {
                    ?>
                    <a id="login-button" class="btn margin-right" href="signin.php" role="button">Sign in</a>

                    <a id="register-button" class="btn margin-right" href="register.php" role="button">Register</a>

                <?php } else { ?>
                    <a class="btn margin-right bg-white" href="logout.php" role="button">Logout</a>
                <?php } ?>


            </div>

        </div>
    </nav>

    <div class="margin-basic div-main">

        <?php
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
                <?php
                if ($app->isUpdate()) {
                ?>
                <h2>
                    Update song
                </h2>
                <?php } else {?>
                <h2>
                    Add new song
                </h2>
                <?php }?>

                <hr>

                <form method="post" class="sign-in-form" action="songs.php">
                    <input type="hidden" name="id" value="<?=$app->getSongID()?>">
                    <div class="mb-3">
                        <label for="songName" class="form-label">Song name</label>
                        <input type="text" class="form-control" id="songName" name="name" value="<?=$app->getSongName()?>">
                    </div>
                    <div class="mb-3">
                        <label for="artist" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="artist" name="artist" value="<?=$app->getSongArtist()?>">
                    </div>
                    <?php
                    if ($app->isUpdate()) {
                        ?>
                        <button type="submit" class="btn btn-dark" name="update">Update</button>
                    <?php } else {?>
                        <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                    <?php }?>
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

                <table class="table">
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
                        foreach ($app->getAllSongs() as $song) { ?>
                        <tr>
                            <td><?=$song->getName()?></td>
                            <td><?=$song->getArtist()?></td>
                            <td><?=$song->getVotes()?></td>
                            <?php
                            if (isset($_SESSION['user'])) {
                            ?>
                            <td>
                                <a href="songs.php?edit=<?=$song->getID()?>" class="btn">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="songs.php?delete=<?=$song->getID()?>" class="btn">
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

    </div>


</body>
</html>