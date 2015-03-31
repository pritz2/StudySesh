<?php
session_start();
$message="";
if(count($_POST)>0) {
	include './include/database_info.php';
	$conn = mysql_connect("$host:$port",$user,$password) or die("Connection error");
	$db_selected = mysql_select_db($db,$conn) or die(mysql_error($db));

	$sql = 'INSERT INTO Taking '.
			'(studentID,classID) '.
			"VALUES ( '".$_SESSION["id"]."', '".$_POST["classID"]."');";

	mysql_query( $sql, $conn );

	header("Location:profile.php");
}
?>