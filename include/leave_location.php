<?php
session_start();

include_once 'db_connect.php';

$sql = 'INSERT INTO LoggedCheckIn '.
    '(studentID, classID, locationID, totalTime) '.
    "VALUES ( '".$_SESSION["id"]."', '".$_SESSION["classID"]."', '".$_SESSION["locationID"].
    "', TIMESTAMPDIFF( MINUTE, (SELECT timeVisited FROM CheckIn WHERE studentID = '".$_SESSION["id"]."'), CURRENT_TIMESTAMP() ));";

mysql_query( $sql, $conn );

$sq2 = "DELETE FROM CheckIn WHERE studentID = '".$_SESSION["id"]."';";

mysql_query( $sq2, $conn );

unset($_SESSION["locationID"]);

if(isset($_SESSION['logout']))
	header("Location:logout.php");
else
	header("Location:../dashboard.php");
?>