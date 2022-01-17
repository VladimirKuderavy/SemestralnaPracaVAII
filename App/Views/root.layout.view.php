<?php use App\Navigation; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="public/style.css">

    <script src="public/table-script.js"></script>
    <script src="public/image-preview.js"></script>
    <script src="public/like-script.js"></script>
    <script src="public/delete-playlist-song-script.js"></script>

    <meta charset="UTF-8">
    <title>Music Charts</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid margin-basic">

        <a href="?c=Home">
            <img id="logo" src="public/images/logo.svg" alt="logo">
        </a>

        <button class="navbar-toggler margin-right" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto">
                <?php if(Navigation::isPageNameSet()) {?>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Home')?>" href="?c=Home">Home</a>
                </li>
                <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link active" href="?c=Home">Home</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Songs')?>" href="?c=Songs">Songs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Albums')?>" href="?c=Albums">Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Charts')?>" href="?c=Charts">Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Playlists')?>" href="?c=Playlists">Playlists</a>
                </li>
            </ul>

            <?php
            if (!\App\SignInApp::isUserLoggedIn()) {
                ?>
                <a id="loginButton" class="btn margin-right" href="?c=SignIn" role="button">Sign in</a>

                <a id="registerButton" class="btn margin-right" href="?c=Registration" role="button">Register</a>

            <?php } else { ?>
                <a class="btn margin-right bg-white" href="?c=SignIn&a=logout" role="button">Logout</a>
            <?php } ?>


        </div>

    </div>
</nav>

<div class="margin-basic div-main content">

    <?php
    if (!empty($data['message'])) {
        ?>

        <div class="alert alert-<?=$data['message_type']?>">
            <?php
            echo $data['message'];
            ?>
        </div>

    <?php } else {?>
        <div id="message-container">

        </div>
    <?php }?>

    <?= $contentHTML ?>

</div>

<footer class="text-center">
    <div class="bg-dark div-footer">
        © 2021 Vladimír Kuderavý
    </div>
</footer>

</body>

</html>

