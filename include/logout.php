<?php

session_start();
$_SESSION['logout'] = true;
if(isset($_SESSION['locationID'])){
	header("Location:leave_location.php");
	exit();
}

$_SESSION = array();
session_destroy();

header("Location:../index.php");
?>