<?php
session_start();
$message="";
if(count($_POST)>0) {
	
	include_once 'db_connect.php';
	
	$result = mysql_query("SELECT * FROM Student WHERE studentID='" . $_POST["studentID"] . "' and password = '". $_POST["password"]."'");
	$row  = mysql_fetch_array($result);
	if(is_array($row)) {
		$_SESSION["id"] = $row[studentID];
		$_SESSION["name"] = $row[name];
		$_SESSION["major"] = $row[major];
		$_SESSION["year"] = $row[year];
	} else {
		$message = "Invalid Username or Password!";
	}
}
if(isset($_SESSION["id"])) {
	header("Location:../dashboard.php");
}
else{
	header("Location:../index.php?err=".$message);
	exit();
}
?>