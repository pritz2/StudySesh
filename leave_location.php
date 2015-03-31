<?php
session_start();
unset($_SESSION["locationID"]);

include './include/database_info.php';
$conn = mysql_connect("$host:$port",$user,$password) or die("Connection error");
$db_selected = mysql_select_db($db,$conn) or die(mysql_error($db));

$sql = "DELETE FROM CheckIn WHERE studentID = '".$_SESSION["id"]."';";

mysql_query( $sql, $conn );

header("Location:dashboard.php");
?>