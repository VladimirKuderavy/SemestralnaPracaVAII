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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="public/style.css">

    <script src="public/table-script.js"></script>

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
                    <a class="nav-link <?=Navigation::isActive('Albums')?>" href="albums.php">Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('Charts')?>" href="?c=Charts">Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=Navigation::isActive('About')?>" href="about.php">About</a>
                </li>
            </ul>

            <?php
            if (!isset($_SESSION['user'])) {
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
    if (isset($data['message'])) {
        ?>

        <div class="alert alert-<?=$data['message_type']?>">
            <?php
            echo $data['message'];
            ?>
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

