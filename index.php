<?php
    session_start();

    include('includes/db.php');
    include('includes/loginsystem.php');
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
            <link rel="stylesheet" href="assets/css/frontpage.css" />
        </head>
        <body>
            <header>
                <div class="grid-wrapper grid-header">
                    <a href="index.php" tabindex="-1"><img src="assets/img/logo_white.svg" class="logo" alt="it-{dschungel} Logo" /></a>

                    <nav class="user-area" role="navigation">
                        <?php
                            if(isLoggedIn()) {
                                ?>
                                    <a href="userarea.php?p=myCourses" class="button button-transparent text-white">ZUM KURSBEREICH</a>
                                    <a href="logout.php" class="button">AUSLOGGEN</a>
                                <?php
                            } else {
                                ?>
                                    <a href="login.php" class="button button-transparent text-white">EINLOGGEN</a>
                                    <a href="login.php" class="button">REGISTRIEREN</a>
                                <?php
                            }
                        ?>
                    </nav>
                </div>
            </header>

            <section class="jumbotron" role="banner">
                <div class="grid-wrapper jumbo-content">
                    <h1>Spielend einfach HTML,<br />PHP und C++ lernen!</h1>
                    <a href="userarea.php?p=allCourses" class="jumbo-button">ZU DEN KURSEN</a>
                </div>
            </section>

            <main role="main">
                <section class="grid-wrapper grid-features">
                    <div class="box featurette">
                        <div class="illustration">
                            <img src="assets/img/illustration_easy.svg" alt="Illustration einer Dame an einem Laptop" />
                        </div>
                        <div class="text">
                            <div class="icon"><i class="mdi mdi-hand-okay"></i></div>
                            <h1>EINFACH</h1>
                            <p>Egal ob Neuzugang oder Anfänger! Unsere Kurse sind für alle einfach verständlich aufgebaut.</p>
                        </div>
                    </div>
                    <div class="box featurette">
                        <div class="illustration">
                            <img src="assets/img/illustration_cheap.svg" alt="Illustration eines Menschen neben einem riesigen Sparschwein" />
                        </div>
                        <div class="text">
                            <div class="icon"><i class="mdi mdi-currency-eur"></i></div>
                            <h1>GÜNSTIG</h1>
                            <p>Bildung muss bezahlbar sein! Daher bieten wir dir professionelle Kurse zu kleinen Preisen!</p>
                        </div>
                    </div>
                    <div class="box featurette">
                        <div class="illustration">
                            <img src="assets/img/illustration_community.svg" alt="Illustration von mehreren Menschen, die miteinander chatten" />
                        </div>
                        <div class="text">
                            <div class="icon"><i class="mdi mdi-account-group"></i></div>
                            <h1>COMMUNITY</h1>
                            <p>Neben unserer Kursen hast du außerdem jederzeit Zugriff auf unserer helfenden Community.</p>
                        </div>
                    </div>
                </section>
            </main>

            <footer>
                <img src="assets/img/logo_black.svg" alt="it-{dschungel} Logo" />

                <a href="">Impressum & Datenschutz</a>
            </footer>

            <script src="assets/js/jumbo-parallax.js"></script>
            <script src="assets/js/enter-click.js"></script>
        </body>
    </html>
