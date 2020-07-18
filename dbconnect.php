<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.

	define('DBHOST', 'localhost');
	define('DBUSER', 'id4438851_localhost');
	define('DBPASS', 'root123');
	define('DBNAME', 'id4438851_dbtest');

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME)
	or die("COnnection FAiled");
	//$dbcon = mysqli_select_db(DBNAME);

	if ( !$conn ) {
		die("Connection failed : " . mysqli_error("hello"));
	}

	/*if ( !$dbcon ) {
		die("Database Connection failed : " . mysqli_error("hello"));
	}*/
