<?php
session_start();
$message="";
if(count($_POST)>0) {
	
	include_once 'db_connect.php';

	$sql = 'INSERT INTO Taking '.
			'(studentID,classID) '.
			"VALUES ( '".$_SESSION["id"]."', '".$_POST["classID"]."');";

	mysql_query( $sql, $conn );

	header("Location:../profile.php");
}
?>