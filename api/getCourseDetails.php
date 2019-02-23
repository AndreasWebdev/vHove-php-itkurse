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

            // Return course as JSON
            echo json_encode(["status" => [200, "Kurs gefunden"], "data" => $getCourseResult]);
        } else {
            // JSON Response 404
            echo json_encode(["status" => [404, "Keine KursID angegeben"], "data" => []]);
        }
    }

?>