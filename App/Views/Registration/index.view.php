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

                    <form method="post" class="sign-in-form" action="?c=Registration&a=registration">
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