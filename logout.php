<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["major"]);
unset($_SESSION["year"]);
header("Location:index.php");
?>