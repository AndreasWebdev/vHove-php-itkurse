<?php
    session_start();

    include('includes/db.php');
    include('includes/loginsystem.php');

    logout();
    header("Location: index.php");
?>