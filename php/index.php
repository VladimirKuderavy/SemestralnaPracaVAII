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
    <title>Music Charts</title>
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

        <div class="row margin-off">

            <div class="col-md-8 p-3">
                <div class="row margin-off div-inner">
                    <h1>
                        Welcome to Music Charts
                    </h1>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur faucibus congue convallis.
                        Curabitur sed magna ut enim tempus elementum nec vitae nulla.
                        Ut et urna sit amet mi vestibulum placerat.
                        Nullam non magna a ipsum dictum aliquet commodo quis neque.
                        Etiam commodo sed sem ut varius.
                        Maecenas at mi sollicitudin, scelerisque ante id, iaculis elit.
                        Donec nec neque ut elit efficitur sodales a et quam.
                        Etiam dignissim pulvinar mauris, vitae vulputate justo lacinia et.
                        Proin ultrices quam vitae dui suscipit tempor. Ut eu lectus purus.
                        Interdum et malesuada fames ac ante ipsum primis in faucibus.
                        Vestibulum tempor, ante quis accumsan lacinia, arcu nisl tincidunt leo, sed feugiat arcu risus quis lectus.
                        Nullam euismod a sem id scelerisque. Suspendisse ac justo lectus.
                        Nullam sapien mi, congue sed elit in, convallis posuere tortor.
                        Aliquam erat volutpat.
                        Praesent dapibus lacus diam, non laoreet erat vulputate eu. Mauris pharetra eu quam eget auctor.
                    </p>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="div-inner">
                    <img id="album" src="../images/sleepy-hallow-still-sleep.jpg" alt="sleepy hallow album still sleep?">

                    <h3>
                        New album "Still Sleep?" from Sleepy Hallow out now !
                    </h3>
                </div>
            </div>

        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner">
                <p>
                    Nullam a tellus neque. Phasellus volutpat magna eget molestie tincidunt.
                    Phasellus condimentum aliquam magna, eu luctus diam. Proin mollis placerat ipsum.
                    Convallis dolor sagittis nunc aliquam, vel euismod odio feugiat. Donec vitae metus lectus.
                    Pellentesque mi elit, pretium in felis ac, accumsan rutrum risus. Etiam elementum dignissim arcu vitae convallis.
                    Donec commodo feugiat elit a bibendum.
                    Sed gravida leo sit amet dui scelerisque, at varius justo facilisis.
                    Donec laoreet nunc sed leo blandit dignissim.
                    Maecenas at mi sollicitudin, scelerisque ante id, iaculis elit.
                    Donec nec neque ut elit efficitur sodales a et quam.
                    Etiam dignissim pulvinar mauris, vitae vulputate justo lacinia et.
                    Proin ultrices quam vitae dui suscipit tempor. Ut eu lectus purus.
                    Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    Vestibulum tempor, ante quis accumsan lacinia, arcu nisl tincidunt leo, sed feugiat arcu risus quis lectus.
                    Nullam euismod a sem id scelerisque. Suspendisse ac justo lectus.
                    Nam dignissim, urna sed vulputate bibendum, ipsum magna pharetra turpis, sit amet viverra velit ligula sit amet massa.
                    Vestibulum a blandit nibh, bibendum efficitur enim.
                    Quisque bibendum neque a tellus fringilla laoreet.
                    Etiam velit sapien, maximus et elit at, eleifend tristique urna.
                    In urna nunc, varius sed enim in, sagittis venenatis quam.
                    Fusce imperdiet orci eget tellus maximus commodo.
                    Donec consectetur arcu purus, vel condimentum risus faucibus sit amet.
                    Quisque et luctus tortor. Morbi vel commodo libero.
                    Cras vestibulum sapien eget rhoncus finibus.
                    Sed ut interdum odio.
                    Ut id facilisis orci, sed malesuada lorem.
                    Vestibulum condimentum varius augue nec fermentum.
                    Nunc facilisis aliquet justo ac interdum.
                    Donec gravida est lacus, nec posuere tortor imperdiet sed.
                    Nullam at massa vitae leo rhoncus ultrices. Nullam accumsan ornare blandit.
                    Nam lobortis magna magna, id suscipit ligula vulputate vel.
                    Morbi fermentum ex eget eros consequat sollicitudin.
                    Proin lacinia risus sapien, sed porttitor lacus ultricies in.
                    Sed quam sem, feugiat eget mi quis, imperdiet scelerisque lectus.
                    Fusce eu lobortis erat.
                    Sed tempor arcu et purus efficitur, sed malesuada diam dapibus.
                    Ut vel lacus vel nulla viverra porta eget et ante.
                    Mauris tristique purus ut tellus bibendum, quis laoreet diam malesuada.
                    Nullam lacinia diam nec metus vehicula luctus.
                </p>
            </div>
        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner">
                <p>
                    Maecenas quam mauris, dignissim eget nisl ac, sollicitudin sollicitudin enim.
                    Nullam congue luctus magna ac feugiat. Nam nec ipsum sed lorem cursus tempor ac ut quam.
                    Proin molestie lorem justo, at aliquam sem ultricies nec.
                    Aliquam erat volutpat. Nam cursus ligula vitae iaculis egestas.
                    Donec tellus ante, maximus sit amet augue a, vehicula ultricies purus.
                    Quisque lacinia tempor hendrerit. Sed elementum velit euismod lorem dictum, at ornare mauris rutrum.
                    Integer ex dui, fermentum vel elit ac, congue viverra ipsum.
                    Nulla turpis massa, porttitor id sem eu, viverra porttitor ante.
                    Nullam aliquet mi vitae eros maximus, id venenatis dui dignissim.
                    Pellentesque semper libero sed facilisis suscipit. Curabitur condimentum molestie lorem.
                    Pellentesque ornare dolor turpis, et elementum est posuere eget.
                </p>
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