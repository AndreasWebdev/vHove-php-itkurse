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
            <title>it-{dschungel}</title>

            <!-- Stylesheets -->
            <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css" />
            <link rel="stylesheet" href="https://indestructibletype.com/fonts/Jost.css" type="text/css" charset="utf-8" />
            <link rel="stylesheet" href="assets/css/reset.css" />
            <link rel="stylesheet" href="assets/css/common.css" />
            <link rel="stylesheet" href="assets/css/userarea.css" />
        </head>
        <body>
            <header>
                <div class="grid-wrapper grid-header">
                    <a href="userarea.php?p=myCourses"><img src="assets/img/logo_white.svg" class="logo" alt="it-{dschungel} Logo" /></a>

                    <nav class="user-area">
                        <a href="logout.php" class="button">Ausloggen</a>
                    </nav>

                    <nav class="tabs">
                        <a href="userarea.php?p=myCourses" <?php if(!isset($_GET['p']) || $_GET['p'] == "myCourses") echo 'class="active"'; ?>>
                            <i class="mdi mdi-school"></i>
                            <span>Meine Kurse</span>
                        </a>
                        <a href="userarea.php?p=allCourses" <?php if(isset($_GET['p']) && $_GET['p'] == "allCourses") echo 'class="active"'; ?>>
                            <i class="mdi mdi-google-classroom"></i>
                            <span>Alle Kurse</span>
                        </a>
                    </nav>
                </div>
            </header>

            <main class="grid-wrapper">
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
                                                    <article class="course" tabindex="0">
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
                            <div class="box-recommendation">
                                <div class="recommendation-notification">Empfehlung für dich</div>

                                <h1>HTML-Grundkurs</h1>
                                <a href="courses.php?allCourses" class="button">Alle Kurse anzeigen</a>
                            </div>

                            <div class="box box-userarea">
                                USERAREA
                            </div>

                            <section>
                                <h1>Deine Kurse</h1>
                                <div class="courses-grid">
                                    <article class="course">
                                        Lorem Ipsum
                                    </article>
                                    <article class="course">
                                        Lorem Ipsum
                                    </article>
                                    <article class="course">
                                        Lorem Ipsum
                                    </article>
                                    <article class="course">
                                        Lorem Ipsum
                                    </article>
                                </div>
                            </section>
                            <?php
                            break;
                    }
                ?>
            </main>

            <footer>
                <img src="assets/img/logo_black.svg" alt="it-{dschungel} Logo" />

                <a href="impressum.php">Impressum & Datenschutz</a>
            </footer>
        </body>
    </html>
