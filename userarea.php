<?php
    session_start();

    include('includes/db.php');
    include('includes/loginsystem.php');

    if(!isLoggedIn()) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <title>it-{dschungel}</title>
            <link rel="shortcut icon" href="assets/img/favicon.png" />

            <!-- Stylesheets -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css" />
            <link rel="stylesheet" href="https://indestructibletype.com/fonts/Jost.css" type="text/css" charset="utf-8" />
            <link rel="stylesheet" href="assets/css/reset.css" />
            <link rel="stylesheet" href="assets/css/common.css" />
            <link rel="stylesheet" href="assets/css/userarea.css" />
            <link rel="stylesheet" href="assets/css/coursedetail.css" />
        </head>
        <body>
            <header>
                <div class="grid-wrapper grid-header">
                    <a href="userarea.php?p=myCourses" tabindex="-1"><img src="assets/img/logo_white.svg" class="logo" alt="it-{dschungel} Logo" /></a>

                    <nav class="user-area" role="navigation">
                        <a href="logout.php" class="button"><i class="mdi mdi-logout-variant"></i> Ausloggen</a>
                    </nav>

                    <nav class="tabs" role="navigation">
                        <a href="userarea.php?p=myCourses" <?php if(!isset($_GET['p']) || $_GET['p'] == "myCourses") echo 'class="active"'; ?> role="tab">
                            <i class="mdi mdi-school"></i>
                            <span>Meine Kurse</span>
                        </a>
                        <a href="userarea.php?p=allCourses" <?php if(isset($_GET['p']) && $_GET['p'] == "allCourses") echo 'class="active"'; ?> role="tab">
                            <i class="mdi mdi-google-classroom"></i>
                            <span>Alle Kurse</span>
                        </a>
                    </nav>
                </div>
            </header>

            <main class="grid-wrapper" role="main">
                <?php
                    if(isset($_GET['p'])) {
                        $page = $_GET['p'];
                    } else {
                        $page = "myCourses";
                    }

                    switch ($page) {
                        case "allCourses":
                            $getAllCourseCategoriesQuery = $db->query("SELECT * FROM coursecategory");
                            $allCategories = $getAllCourseCategoriesQuery->fetch_all(MYSQLI_ASSOC);
                            $getAllCourseCategoriesQuery->close();

                            foreach($allCategories as $category) {
                                ?>
                                    <section>
                                        <h1><?=$category['title'];?></h1>
                                        <div class="courses-grid">
                                            <?php
                                                $getCoursesFromCategoryQuery = $db->query("SELECT * FROM course WHERE course_category = ".$category['id']." ORDER BY difficulty ASC");
                                                $allCoursesFromCategory = $getCoursesFromCategoryQuery->fetch_all(MYSQLI_ASSOC);
                                                $getCoursesFromCategoryQuery->close();

                                                foreach($allCoursesFromCategory as $course) {
                                                    ?>
                                                    <article class="course" tabindex="0" data-course="<?=$course['id'];?>" onkeyup="EnterClick(event)">
                                                        <div class="course-difficulty">
                                                            <?php
                                                                switch($course['difficulty']) {
                                                                    case 1:
                                                                        ?>
                                                                        <span class="icons">
                                                                            <i class="mdi mdi-star"></i>
                                                                            <i class="mdi mdi-star-outline"></i>
                                                                            <i class="mdi mdi-star-outline"></i>
                                                                        </span>
                                                                        <span class="text">Anfängerkurs</span>
                                                                        <?php
                                                                        break;
                                                                    case 2:
                                                                        ?>
                                                                        <span class="icons">
                                                                            <i class="mdi mdi-star"></i>
                                                                            <i class="mdi mdi-star"></i>
                                                                            <i class="mdi mdi-star-outline"></i>
                                                                        </span>
                                                                        <span class="text">Mittlere Schwierigkeit</span>
                                                                        <?php
                                                                        break;
                                                                    case 3:
                                                                        ?>
                                                                        <span class="icons">
                                                                            <i class="mdi mdi-star"></i>
                                                                            <i class="mdi mdi-star"></i>
                                                                            <i class="mdi mdi-star"></i>
                                                                        </span>
                                                                        <span class="text">Fortgeschrittenenkurse</span>
                                                                        <?php
                                                                        break;
                                                                }
                                                            ?>
                                                        </div>

                                                        <h1><?=$course['title'];?></h1>
                                                        <p><?=$course['short_description'];?></p>
                                                    </article>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </section>
                                <?php
                            }

                            ?>
                            <?php
                            break;
                        case "myCourses":
                            ?>
                            <div class="box-recommendation" role="banner">
                                <div class="recommendation-notification">Empfehlung für dich</div>

                                <h1>HTML-Grundkurs</h1>
                                <a href="userarea.php?p=allCourses" class="button">Alle Kurse anzeigen</a>
                            </div>

                            <div class="box box-userarea">
                                <div class="userarea-info">
                                    <h1><?=getUserData($_SESSION['itd_userid'], "username");?></h1>
                                    <p><?=getUserData($_SESSION['itd_userid'], "email")?></p>
                                </div>
                                <div class="userarea-action">
                                    <a href="userarea.php?p=profilesettings" class="button button-primary"><i class="mdi mdi-settings"></i> Profileinstellungen</a>
                                </div>
                            </div>

                            <section>
                                <h1>Deine Kurse</h1>
                                <?php
                                $getBookedCoursesQuery = $db->query("SELECT * FROM bookedcourse WHERE user = ".$_SESSION['itd_userid']);
                                $bookedCourses = $getBookedCoursesQuery->fetch_all(MYSQLI_ASSOC);
                                $getBookedCoursesQuery->close();

                                if(empty($bookedCourses)) {
                                    ?>
                                        <div class="box">
                                            <p>
                                                Du hast dich für noch keinen Kurs eingetragen!
                                            </p>
                                        </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="courses-grid">
                                        <?php
                                        foreach ($bookedCourses as $bookedCourse) {

                                            $getCourseInfoQuery = $db->query("SELECT * FROM course WHERE id = " . $bookedCourse['course']);
                                            $course = $getCourseInfoQuery->fetch_all(MYSQLI_ASSOC);
                                            $getCourseInfoQuery->close();

                                            $course = $course[0];

                                            ?>
                                            <article class="course" tabindex="0" data-course="<?= $course['id']; ?>"
                                                     onkeyup="EnterClick(event)">
                                                <div class="course-difficulty">
                                                    <?php
                                                    switch ($course['difficulty']) {
                                                        case 1:
                                                            ?>
                                                            <span class="icons">
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star-outline"></i>
                                                                    <i class="mdi mdi-star-outline"></i>
                                                                </span>
                                                            <span class="text">Anfängerkurs</span>
                                                            <?php
                                                            break;
                                                        case 2:
                                                            ?>
                                                            <span class="icons">
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star-outline"></i>
                                                                </span>
                                                            <span class="text">Mittlere Schwierigkeit</span>
                                                            <?php
                                                            break;
                                                        case 3:
                                                            ?>
                                                            <span class="icons">
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                    <i class="mdi mdi-star"></i>
                                                                </span>
                                                            <span class="text">Fortgeschrittenenkurse</span>
                                                            <?php
                                                            break;
                                                    }
                                                    ?>
                                                </div>

                                                <h1><?= $course['title']; ?></h1>
                                                <p><?= $course['short_description']; ?></p>
                                            </article>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                </div>
                            </section>
                            <?php
                            break;
                        case "profilesettings":
                            ?>
                                <section>
                                    <h1>Profileinstellungen</h1>
                                    <div class="box">
                                        <form action="" method="POST">
                                            <?php
                                                if(!empty($_POST['change_submit'])) {
                                                    if($_POST['change_forename'] != getUserData($_SESSION['itd_userid'], "forename") && !empty($_POST['change_forename'])) {
                                                        // Change Forename
                                                        try {
                                                            if(changeUserForename($_SESSION['itd_userid'], $_SESSION['itd_seckey'], $_POST['change_forename'])) {
                                                                echo "<div class='alert alert-success'>Vorname wurde geändert!</div>";
                                                            }
                                                        } catch (Exception $e) {
                                                            echo "<div class='alert alert-error'>".$e->getMessage()."</div>";
                                                        }
                                                    }
                                                    if($_POST['change_lastname'] != getUserData($_SESSION['itd_userid'], "lastname") && !empty($_POST['change_lastname'])) {
                                                        // Change Lastname
                                                        try {
                                                            if(changeUserLastname($_SESSION['itd_userid'], $_SESSION['itd_seckey'], $_POST['change_lastname'])) {
                                                                echo "<div class='alert alert-success'>Nachname wurde geändert!</div>";
                                                            }
                                                        } catch (Exception $e) {
                                                            echo "<div class='alert alert-error'>".$e->getMessage()."</div>";
                                                        }
                                                    }
                                                    if($_POST['change_email'] != getUserData($_SESSION['itd_userid'], "email") && !empty($_POST['change_email'])) {
                                                        // Change email
                                                        try {
                                                            if(changeUserEmail($_SESSION['itd_userid'], $_SESSION['itd_seckey'], $_POST['change_email'])) {
                                                                echo "<div class='alert alert-success'>E-Mail wurde geändert!</div>";
                                                            }
                                                        } catch (Exception $e) {
                                                            echo "<div class='alert alert-error'>".$e->getMessage()."</div>";
                                                        }
                                                    }
                                                    if(!empty($_POST['change_currentpassword'])) {
                                                        // Change password
                                                        try {
                                                            if (changeUserPassword($_SESSION['itd_userid'], $_SESSION['itd_seckey'], $_POST['change_currentpassword'], $_POST['change_newpassword'])) {
                                                                echo "<div class='alert alert-success'>Passwort wurde geändert!</div>";
                                                            }
                                                        } catch (Exception $e) {
                                                            echo "<div class='alert alert-error'>".$e->getMessage()."</div>";
                                                        }
                                                    }
                                                }
                                            ?>

                                            <div class="input-field">
                                                <label>Vorname</label>
                                                <input type="text" name="change_forename" value="<?=getUserData($_SESSION['itd_userid'], "forename")?>" />
                                            </div>
                                            <div class="input-field">
                                                <label>Nachname</label>
                                                <input type="text" name="change_lastname" value="<?=getUserData($_SESSION['itd_userid'], "lastname")?>" />
                                            </div>
                                            <div class="input-field">
                                                <label>E-Mail Adresse</label>
                                                <input type="email" name="change_email" value="<?=getUserData($_SESSION['itd_userid'], "email")?>" />
                                            </div>
                                            <div class="input-field">
                                                <label>Aktuelles Passwort</label>
                                                <input type="password" name="change_currentpassword" placeholder="Leer lassen, um nicht zu ändern" />
                                            </div>
                                            <div class="input-field">
                                                <label>Neues Passwort</label>
                                                <input type="password" name="change_newpassword" placeholder="Leer lassen, um nicht zu ändern" />
                                            </div>
                                            <input type="submit" name="change_submit" class="button button-primary" value="Ändern" />
                                        </form>
                                    </div>
                                </section>
                            <?php
                            break;
                    }
                ?>
            </main>

            <footer>
                <img src="assets/img/logo_black.svg" alt="it-{dschungel} Logo" />

                <a href="legal.php">Impressum & Datenschutz</a>
            </footer>

            <div class="modal-details" role="dialog" aria-labelledby="modalHolderTitle" aria-describedby="modalHolderShortDescription">
                <div class="grid-wrapper modal-details-content">

                    <article class="course-details">
                        <a href="javascript:closeModal();" class="button button-primary"><i class="mdi mdi-close mdi-icononly"></i></a>
                        <div class="course-difficulty" id="modalHolderDifficulty">
                            <span class="icons">
                                <i class="mdi mdi-star"></i>
                                <i class="mdi mdi-star-outline"></i>
                                <i class="mdi mdi-star-outline"></i>
                            </span>
                            <span class="text">Anfängerkurs</span>
                        </div>

                        <h1 id="modalHolderTitle"></h1>
                        <p id="modalHolderShortDescription"></p>
                    </article>

                    <div class="course-moredetails">
                        <div class="box">
                            <h3>Kursinformationen</h3>
                            <p id="modalHolderLongDescription"></p>
                            <h3>Informationen zur Schulungsstätte</h3>
                            <p>IT-Dschungel<br />Entwicklungsgasse 10<br />45123 Gelsenkirchen<br /><br />Telefon: 0209-222222<br />E-Mail: info@it-dschungel.de<br />Web: www.it-dschungel.de</p>
                        </div>
                        <div class="box box-coursedates">
                            <h3>Termine</h3>
                            <div class="course-dates interactable" id="modalHolderDates">
                            </div>

                            <h3>Für diesen Kurs voranmelden</h3>
                            <p class="notification">Klicke einen der Termine oben an, um dich für diesen Kurs vorzuanmelden.</p>
                            <div class="button button-primary button-disabled" id="btnCourseConfirm" tabindex="0" onkeyup="EnterClick(event)">Kursanmeldung bestätigen</div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="assets/js/course-detail.js"></script>
            <script src="assets/js/enter-click.js"></script>
        </body>
    </html>
