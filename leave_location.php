<?php
session_start();
unset($_SESSION["locationID"]);
header("Location:dashboard.php");
?>