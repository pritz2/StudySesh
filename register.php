<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost:8889","root","root");

	$sql = 'INSERT INTO Student '.
			'(studentID,password, name, major, year) '.
			"VALUES ( '".$_POST["studentID"]."', '".$_POST["password"]."', '".$_POST["name"]."', '".$_POST["major"]."', '".$_POST["year"]."');";

	mysql_select_db("studyses_db",$conn);

	mysql_query( $sql, $conn );

	$_SESSION["id"] = $_POST["studentID"];
	$_SESSION["name"] = $_POST["name"];
	$_SESSION["major"] = $_POST["major"];
	$_SESSION["year"] = $_POST["year"];

	header("Location:dashboard.php");
}
?>