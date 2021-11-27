<?php
require '..\php\App.php';

$app = new App();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../css/style.css">

    <meta charset="UTF-8">
    <title>Songs | Music Charts</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid margin-basic">

            <a href="../html/index.html">
                <img id="logo" src="../images/logo.svg" alt="logo">
            </a>

            <button class="navbar-toggler margin-right" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../html/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="songs.php">Songs</a>
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

                <a id="login-button" class="btn margin-right" href="../html/signin.html" role="button">Sign in</a>

                <a id="register-button" class="btn margin-right" href="../html/register.html" role="button">Register</a>

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
            $allSongs = $app->getAllSongs();
        ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Votes</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                foreach ($app->getAllSongs() as $song) { ?>
                    <tr>
                        <td><?=$song->getName()?></td>
                        <td><?=$song->getArtist()?></td>
                        <td><?=$song->getVotes()?></td>
                        <td>
                            <a href="songs.php?edit=<?=$song->getID()?>" class="btn btn-info">Edit</a>
                            <a href="songs.php?delete=<?=$song->getID()?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                <?php }?>

            </table>
        </div>




        <form method="POST">
            <input type="hidden" name="id" value="<?=$app->getId()?>">
            <div class="mb-3">
                <label for="songName" class="form-label">Song name</label>
                <input type="text" class="form-control" id="songName" name="name" value="<?=$app->getName()?>">
            </div>
            <div class="mb-3">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" class="form-control" id="artist" name="artist" value="<?=$app->getArtist()?>">
            </div>
            <?php
                if ($app->isUpdate()) {
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php } else {?>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <?php }?>
        </form>

    </div>


</body>
</html>