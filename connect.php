<?php
	ini_set('display_errors', 'Off');
	define("web_title", "RC Workshop");
	date_default_timezone_set("Asia/Bangkok");
	session_start();
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'workshop';

	$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(mysqli_error($dbcon)) {
		echo 'ติดต่อฐานข้อมูลไม่สำเร็จ';
	}
	mysqli_query($dbcon,"SET NAMES UTF8");
?>