<?php
    session_start();

    include('../includes/db.php');
    include('../includes/loginsystem.php');

    // Only return courses if logged in
    if(!isLoggedIn()) {
        // JSON Response 403
        echo json_encode(["status" => [403, "Nicht eingeloggt!"], "data" => []]);
    } else {
        // Check if courseID & dateID parameter is set
        if ($_GET['courseID'] && $_GET['dateID']) {
            // Insert new Booking

            // Return response as JSON
            echo json_encode(["status" => [200, "Voranmeldung eingetragen"], "successful" => true]);
        } else {
            // JSON Response 404
            echo json_encode(["status" => [404, "Keine KursID / DatumsID angegeben"], "data" => []]);
        }
    }
?>