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
            <link rel="stylesheet" href="assets/css/coursedetail.css" />
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
                                                    <article class="course" tabindex="0" data-course="<?=$course['id'];?>">
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

                            <!-- <div class="box box-userarea">
                                USERAREA
                            </div> -->

                            <section>
                                <h1>Deine Kurse</h1>
                                <div class="courses-grid">
                                <?php
                                $getBookedCoursesQuery = $db->query("SELECT * FROM bookedcourse WHERE user = ".$_SESSION['itd_userid']);
                                $bookedCourses = $getBookedCoursesQuery->fetch_all(MYSQLI_ASSOC);
                                $getBookedCoursesQuery->close();

                                foreach($bookedCourses as $bookedCourse) {

                                    $getCourseInfoQuery = $db->query("SELECT * FROM course WHERE id = ".$bookedCourse['course']);
                                    $course = $getCourseInfoQuery->fetch_all(MYSQLI_ASSOC);
                                    $getCourseInfoQuery->close();

                                    $course = $course[0];

                                    ?>
                                    <article class="course" tabindex="0" data-course="<?=$course['id'];?>">
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
                            break;
                    }
                ?>
            </main>

            <footer>
                <img src="assets/img/logo_black.svg" alt="it-{dschungel} Logo" />

                <a href="impressum.php">Impressum & Datenschutz</a>
            </footer>

            <div class="modal-details">
                <div class="grid-wrapper modal-details-content">

                    <article class="course-details">
                        <a href="javascript:closeModal();" class="button button-primary"><i class="mdi mdi-close"></i></a>
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
                            <p id="modalHolderLongDescription">In diesem Kurs lernst du die Grundlagen von XML und wie man XML in die <br/>Datenwiedergabe einbinden kann, um Arbeitsabläufe zu optimieren.</p>
                            <h3>Informationen zur Schulungsstätte</h3>
                            <p>IT-Dschungel<br />Entwicklungsgasse 10<br />45123 Gelsenkirchen<br /><br />Telefon: 0209-222222<br />E-Mail: info@it-dschungel.de<br />Web: www.it-dschungel.de</p>
                        </div>
                        <div class="box box-coursedates">
                            <h3>Termine</h3>
                            <div class="course-dates interactable" id="modalHolderDates">
                                <div class="course-date active">
                                    <span>Sa</span>
                                    <span>01.03.2019</span>
                                </div>
                                <div class="course-date">
                                    <span>Sa</span>
                                    <span>01.03.2019</span>
                                </div>
                                <div class="course-date">
                                    <span>Sa</span>
                                    <span>01.03.2019</span>
                                </div>
                            </div>

                            <h3>Für diesen Kurs voranmelden</h3>
                            <p class="notification">Klicke einen der Termine oben an, um dich für diesen Kurs vorzuanmelden.</p>
                            <div class="button button-primary button-disabled" id="btnCourseConfirm">Kursanmeldung bestätigen</div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="assets/js/course-detail.js"></script>
        </body>
    </html>
