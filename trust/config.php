<?php
	

	session_start();
	ob_start();

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_data = "test";

	$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_data);
	mysqli_set_charset($connect, 'utf8');

	$title = "Bán Acc Game - Shop Nick Giá Rẻ - Uy Tín Tại Việt Nam";
		$home_url = "http://localhost";
	$id_fb = "1486511711"; // id fb admin


?>