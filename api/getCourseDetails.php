<?php
    session_start();

    include('../includes/db.php');
    include('../includes/loginsystem.php');

    // Only return courses if logged in
    if(!isLoggedIn()) {
        // JSON Response 403
        echo json_encode(["status" => [403, "Nicht eingeloggt!"], "data" => []]);
    } else {
        // Check if courseID parameter is set
        if ($_GET['courseID']) {
            // Get course from database
            $getCourseQuery = $db->prepare("SELECT * FROM course WHERE id = ?");
            $getCourseQuery->bind_param("i", $_GET['courseID']);
            $getCourseQuery->execute();
            $getCourseResult = $getCourseQuery->get_result()->fetch_assoc();

            // Get course dates from database
            $getCourseDatesQuery = $db->prepare("SELECT * FROM coursedate WHERE course = ?");
            $getCourseDatesQuery->bind_param("i", $_GET['courseID']);
            $getCourseDatesQuery->execute();
            $getCourseDatesResult = $getCourseDatesQuery->get_result()->fetch_all(MYSQLI_ASSOC);

            $getCourseResult['dates'] = $getCourseDatesResult;

            // Get course booking from database
            $getCourseBookingQuery = $db->prepare("SELECT * FROM bookedcourse WHERE course = ? AND user = ?");
            $getCourseBookingQuery->bind_param("ii", $_GET['courseID'], $_SESSION['itd_userid']);
            $getCourseBookingQuery->execute();
            $getCourseBookingResult = $getCourseBookingQuery->get_result()->fetch_assoc();

            $getCourseResult['booking'] = $getCourseBookingResult;

            // Return course as JSON
            echo json_encode(["status" => [200, "Kurs gefunden"], "data" => $getCourseResult, "user" => ["id" => $_SESSION['itd_userid']]]);
        } else {
            // JSON Response 404
            echo json_encode(["status" => [404, "Keine KursID angegeben"], "data" => []]);
        }
    }

?>