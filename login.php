<?php
    session_start();

    include('includes/db.php');
    include('includes/loginsystem.php');

    if(isLoggedIn()) {
        header("Location: userarea.php?p=myCourses");
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>it-{dschungel}</title>

            <!-- Stylesheets -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css" />
            <link rel="stylesheet" href="https://indestructibletype.com/fonts/Jost.css" type="text/css" charset="utf-8" />
            <link rel="stylesheet" href="assets/css/reset.css" />
            <link rel="stylesheet" href="assets/css/common.css" />
            <link rel="stylesheet" href="assets/css/login.css" />
        </head>
        <body>
            <aside>
                <header>
                    <img src="assets/img/logo_rgb.svg" alt="it{dschungel} Logo" />

                    <a href="index.php" class="button">Zurück</a>
                </header>

                <img src="assets/img/illustration_developer.svg" class="illustration" alt="Illustration eines Mannes an einem Computer" />
            </aside>
            <main>
                <form action="" method="POST">
                    <h1>Logg dich in deine it{id} ein.</h1>

                    <?php
                        if(isset($_POST['login_submit'])) {
                            try {
                                login($_POST['login_username'], $_POST['login_password']);
                            } catch(Exception $ex) {
                                echo $ex;
                            }
                        }
                    ?>

                    <div class="input-field">
                        <label>Benutzername</label>
                        <input type="text" name="login_username" />
                    </div>
                    <div class="input-field">
                        <label>Passwort</label>
                        <input type="password" name="login_password" />
                    </div>
                    <input type="submit" name="login_submit" class="button button-primary" value="Einloggen" />
                    <div class="new-account-notice">Du hast noch keinen Account? <a href="register.php">Erstelle dir einen!</a></div>
                </form>
            </main>
        </body>
    </html>
