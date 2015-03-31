<?php
session_start();
$message="";
if(count($_POST)>0) {
	include './include/database_info.php';
	$conn = mysql_connect("$host:$port",$user,$password) or die("Connection error");
	$db_selected = mysql_select_db($db,$conn) or die(mysql_error($db));

	$sql = 'INSERT INTO CheckIn '.
			'(studentID,locationID,classID) '.
			"VALUES ( '".$_SESSION["id"]."', '".$_POST["locationID"]."', '".$_POST["classID"]."');";

	mysql_query( $sql, $conn );

	$_SESSION["locationID"] = $_POST["locationID"];

	header("Location:at_location.php");
}
?>