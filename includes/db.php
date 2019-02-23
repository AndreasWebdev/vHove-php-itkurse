<?php
    define('MYSQL_HOST', 'localhost');
    define('MYSQL_DB', 'itdschungel');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASS', 'root');

    $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    $db->set_charset("utf8");
?>