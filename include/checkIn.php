<?php
session_start();
$message="";
if(count($_POST)>0) {
	
	include_once 'db_connect.php';

	$sql = 'INSERT INTO CheckIn '.
			'(studentID,locationID,classID, timeVisited) '.
			"VALUES ( '".$_SESSION["id"]."', '".$_POST["locationID"]."', '".$_POST["classID"]."', CURRENT_TIMESTAMP());";

	mysql_query( $sql, $conn );


	$_SESSION["locationID"] = $_POST["locationID"];
    $_SESSION["classID"] = $_POST["classID"];

	header("Location:../at_location.php");
}
?>