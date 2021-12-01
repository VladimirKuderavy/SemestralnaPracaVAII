<?php
require '../php/RegistrationApp.php';

$app = new RegistrationApp();
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
    <title>Register | Music Charts</title>
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
                        <a class="nav-link" href="albums.php">Albums</a>
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

        <div class="div-form">

            <div class="row margin-off">

                <div class="col-md-3 p-3">

                </div>

                <div class="col-md-6 p-3">

                    <div class="div-inner">
                        <div class="padding-10">

                            <h2>Register</h2>
                            <hr>

                            <form method="post" class="sign-in-form">
                                <div>
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" class="form-control form-control-lg mb-3" id="email" name="email" maxlength="255" required>
                                </div>
                                <div>
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-lg mb-3" id="username" name="username" maxlength="255" required>
                                </div>
                                <div>
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-lg mb-3" id="password" name="password" maxlength="255" required>
                                </div>

                                <button type="submit" class="btn btn-lg btn-dark" name="submit">Register</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 p-3">

                </div>

            </div>

        </div>

    </div>


<footer class="text-center">
    <div class="bg-dark div-footer">
        © 2021 Vladimír Kuderavý
    </div>
</footer>


</body>
</html>