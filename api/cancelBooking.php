<?php
    session_start();

    include('../includes/db.php');
    include('../includes/loginsystem.php');

    // Only return courses if logged in
    if(!isLoggedIn()) {
        // JSON Response 403
        echo json_encode(["status" => [403, "Nicht eingeloggt!"], "data" => []]);
    } else {
        // Check if bookingID parameter is set
        if ($_GET['bookingID']) {
            // Remove Booking
            $newBookingQuery = $db->prepare("DELETE FROM `bookedcourse` WHERE `user` = ? AND `id` = ?");
            $newBookingQuery->bind_param("ii", $_SESSION['itd_userid'], $_GET['bookingID']);
            $newBookingQuery->execute();

            // Return response as JSON
            echo json_encode(["status" => [200, "Voranmeldung gelöscht!"], "successful" => true]);
        } else {
            // JSON Response 404
            echo json_encode(["status" => [404, "Keine BuchungsID angegeben"], "data" => []]);
        }
    }
?>