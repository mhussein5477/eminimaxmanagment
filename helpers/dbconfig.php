<?php


$db = mysqli_connect('127.0.0.1','root','','inventory');

if (mysqli_connect_errno()) {
	echo 'Database connection failed with the following errors:'. mysqli_connect_error();
	die();
} 

session_start();

include $_SERVER['DOCUMENT_ROOT'].'/inventory/helpers/helper.php';
?>
