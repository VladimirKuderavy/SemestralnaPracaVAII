<?php
session_start();
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
    <title>Albums | Music Charts</title>
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="songs.php">Songs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="albums.php">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="charts.php">Charts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>

                <?php
                if (!isset($_SESSION['user'])) {
                    ?>
                    <a id="loginButton" class="btn margin-right" href="signin.php" role="button">Sign in</a>

                    <a id="registerButton" class="btn margin-right" href="register.php" role="button">Register</a>

                <?php } else { ?>
                    <a class="btn margin-right bg-white" href="logout.php" role="button">Logout</a>
                <?php } ?>

            </div>

        </div>
    </nav>

</body>
</html>