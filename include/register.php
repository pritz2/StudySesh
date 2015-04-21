<?php
session_start();
$message="";
if(count($_POST)>0) {
	
	include_once 'db_connect.php';

	$sql = 'INSERT INTO Student '.
			'(studentID,password, name, major, year) '.
			"VALUES ( '".$_POST["studentID"]."', '".$_POST["password"]."', '".$_POST["name"]."', '".$_POST["major"]."', '".$_POST["year"]."');";

	mysql_query( $sql, $conn );

	$_SESSION["id"] = $_POST["studentID"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["major"] = $_POST["major"];
	$_SESSION["year"] = $_POST["year"];

	header("Location:../dashboard.php");
}
?>