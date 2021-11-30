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
    <title>About | Music Charts</title>
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
                        <a class="nav-link active" href="about.php">About</a>
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

        <div class="row margin-off">

            <div class="col-md-6 p-3">
                <div class="div-inner">

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

            <div class="col-md-6 p-3">
                <div class="div-inner">
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

        </div>

        <div class="col-md-12 p-3">
            <div class="div-inner">
                <p>
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    Aenean luctus mi orci, vitae rutrum eros eleifend sit amet.
                    Proin felis urna, semper sit amet scelerisque in, pharetra eu velit.
                    Suspendisse tincidunt, mauris ac condimentum condimentum, libero nulla ultrices nunc, feugiat suscipit nibh libero non massa.
                    Mauris vitae dictum justo.
                    Maecenas nec malesuada arcu, at tempus metus. Sed mollis lacus et magna feugiat, quis sagittis ligula sodales.
                    Sed mattis dapibus nisi, rutrum euismod dui faucibus ac.
                    Sed feugiat euismod libero ac pellentesque. In luctus justo quis finibus aliquet.
                    In consequat risus ac elit sollicitudin gravida.
                    Quisque tempor, dolor quis suscipit viverra, orci nisi mollis est, quis lobortis nisi leo vel magna.
                    Nullam a risus et magna lacinia sollicitudin.
                    Vivamus massa dolor, pretium sed sem eu, mattis semper metus.
                    Phasellus tristique urna non mi tristique, ac maximus ipsum volutpat.
                    Pellentesque pellentesque tincidunt orci.
                    Nunc a dolor eget enim rhoncus vestibulum.
                    Praesent fermentum ex eget dui ullamcorper hendrerit.
                    Sed augue mauris, rutrum in purus quis, faucibus euismod augue.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Ut congue ipsum a volutpat pulvinar.
                    Nullam at eleifend turpis.
                    Aenean sem ante, faucibus vehicula condimentum vitae, hendrerit eget augue.
                    Nunc sollicitudin aliquet dolor sit amet auctor.
                    Integer volutpat orci tincidunt elementum placerat.
                    Curabitur bibendum commodo ultricies.
                    Suspendisse venenatis ullamcorper tellus, ac tincidunt velit venenatis sit amet.
                    Praesent suscipit semper nunc sit amet dapibus.
                    Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Maecenas nec mauris ligula.
                    Pellentesque tempor vel ipsum semper varius.
                </p>
            </div>
        </div>

        <div class="row margin-off">

            <div class="col-md-4 p-3">
                <div class="div-inner">

                    <p>
                        Donec convallis est augue, sed venenatis justo feugiat et.
                        Donec condimentum ullamcorper euismod. Suspendisse potenti.
                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                        Vivamus sed orci id lorem tempor consectetur.
                        Donec sollicitudin metus ac mollis commodo.
                        Mauris tempor ante id sodales facilisis.
                        Nam pharetra ante quis libero auctor, vel blandit neque placerat.
                    </p>

                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="div-inner">
                    <p>
                        Donec eget dapibus orci. In hac habitasse platea dictumst.
                        Integer posuere aliquet porta. Aenean vestibulum lacinia sagittis.
                        Donec nec bibendum leo.
                        Ut hendrerit urna orci, quis auctor arcu aliquet sit amet.
                        Duis odio felis, hendrerit vitae vestibulum sit amet, auctor at ipsum.
                        Quisque venenatis condimentum ipsum, eu ullamcorper mauris finibus at.
                        Nulla vel odio nunc.
                        Sed blandit ultrices leo quis pretium.
                    </p>
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="div-inner">
                    <p>
                        Cras at nibh diam.
                        Vivamus sed pharetra tellus.
                        Mauris volutpat sodales ligula quis aliquam.
                        Nullam eget nisi lectus.
                        Ut quis enim ut felis molestie rhoncus.
                        Nullam porta ante sed libero tempor, vel gravida risus vehicula.
                        Mauris erat metus, congue vel laoreet vel, tristique non tortor.
                        Nulla semper in odio ut vestibulum.
                        Donec rhoncus sem quis elit aliquet, sit amet ullamcorper purus commodo.
                        Praesent tincidunt quam eu lobortis tempor.
                    </p>
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