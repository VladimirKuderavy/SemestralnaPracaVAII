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
    <title>Charts | Music Charts</title>
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
                        <a class="nav-link active" href="charts.php">Charts</a>
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

        <div class="col-md-12 p-3">
            <div class="div-inner">


                <div class="number-one-caption-padding">
                    <h2>1# Album this week</h2>
                    <hr>
                </div>


                <div class="row margin-off number-one-padding">
                    <div class="col-sm-2 padding-off">
                        <img class="number-one-image" src="../images/sleepy-hallow-still-sleep.jpg" alt="sleepy hallow still sleep">
                    </div>

                    <div class="col-sm-10 number-one-text">
                        <h3>Sleepy Hallow - Still Sleep ?</h3>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner table-responsive padding-20">
                <h2>
                    TOP 10 Albums
                </h2>

                <hr>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Album Name</th>
                        <th scope="col">Artist</th>
                        <th colspan="2" scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody class="tbody-chart">
                    <tr>
                        <th scope="row">1</th>
                        <td>Still Sleep?</td>
                        <td>Sleepy Hallow</td>
                        <td>4001</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Certified Lover Boy</td>
                        <td>Drake</td>
                        <td>3214</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Sour</td>
                        <td>Olivia Rodrigo</td>
                        <td>2844</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Shoot for the Stars Aim for the Moon</td>
                        <td>Pop Smoke</td>
                        <td>2631</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Astroworld</td>
                        <td>Travis Scott</td>
                        <td>2247</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>good kid, m.A.A.d city</td>
                        <td>Kendrick Lamar</td>
                        <td>1935</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Starboy</td>
                        <td>The Weeknd</td>
                        <td>1610</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Nevermind</td>
                        <td>Nirvana</td>
                        <td>1578</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Faith</td>
                        <td>Pop Smoke</td>
                        <td>1196</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Expensive Pain</td>
                        <td>Meek Mill</td>
                        <td>1014</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner">

                    <div class="number-one-caption-padding">
                        <h2>1# Song this week</h2>
                        <hr>
                    </div>

                    <div class="row margin-off number-one-padding">
                        <div class="col-sm-2 padding-off">
                            <img class="number-one-image" src="../images/pop-smoke-dior.jpg" alt="pop smoke dior">
                        </div>

                        <div class="col-sm-10 number-one-text">
                            <h3>Pop Smoke - Dior</h3>
                        </div>
                    </div>

            </div>
        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner table-responsive padding-20">
                <h2>
                    TOP 10 Songs
                </h2>

                <hr>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Song Name</th>
                        <th scope="col">Artist</th>
                        <th colspan="2" scope="col">Votes</th>
                    </tr>
                    </thead>
                    <tbody class="tbody-chart">
                    <tr>
                        <th scope="row">1</th>
                        <td>Dior</td>
                        <td>Pop Smoke</td>
                        <td>1547</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Rockstar</td>
                        <td>DaBaby</td>
                        <td>1229</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>2055</td>
                        <td>Sleepy Hallow</td>
                        <td>944</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>RAPSTAR</td>
                        <td>Polo G</td>
                        <td>895</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Happier than ever</td>
                        <td>Billie Eilish</td>
                        <td>768</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Fair Trade</td>
                        <td>Drake</td>
                        <td>741</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>All The Small Things</td>
                        <td>Blink-182</td>
                        <td>693</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>On Go</td>
                        <td>Sheff G</td>
                        <td>622</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>Ocean Avenue</td>
                        <td>Yellowcard</td>
                        <td>576</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>Still Waiting</td>
                        <td>Sum 41</td>
                        <td>512</td>
                        <td>
                            <img src="../images/thumb_up_black_18dp.svg" class="thumb-up-icon" alt="thumb_up_icon">
                        </td>
                    </tr>
                    </tbody>
                </table>
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