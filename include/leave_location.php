<?php
session_start();
unset($_SESSION["locationID"]);

include_once 'db_connect.php';

$sql = "DELETE FROM CheckIn WHERE studentID = '".$_SESSION["id"]."';";

mysql_query( $sql, $conn );

if(isset($_SESSION['logout']))
	header("Location:logout.php");
else
	header("Location:../dashboard.php");
?>