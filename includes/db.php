<?php
    define('MYSQL_HOST', 'localhost');
    define('MYSQL_DB', 'itdschungel');
    define('MYSQL_USER', 'wkbs');
    define('MYSQL_PASS', 'wkbs');

    $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    $db->set_charset("utf8");
?>