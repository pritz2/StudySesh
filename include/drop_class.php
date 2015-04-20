<?php

session_start();
// unset($_SESSION["locationID"]);

include_once 'db_connect.php';

$sql = "DELETE FROM Taking WHERE studentID = '".$_SESSION["id"]."' AND classID = '".$_POST['classID']."';";

mysql_query( $sql, $conn );

header("Location:../dashboard.php");

?>