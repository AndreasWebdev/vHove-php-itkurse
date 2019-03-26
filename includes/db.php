<?php
	error_reporting(E_ALL & ~E_NOTICE);
	mysqli_report(MYSQLI_REPORT_STRICT);

    define('MYSQL_HOST', 'localhost');
    define('MYSQL_DB', 'itdschungel');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASS', 'root');

	try {
		$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
		$db->set_charset("utf8");
	} catch(Exception $ex) {
		echo "<h1>Datenbankverbindung schlug fehl!</h1>";
		var_dump($ex);
		exit;
	}
?>