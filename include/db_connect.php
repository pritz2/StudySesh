<?php

include_once 'db_config.php';
$conn = mysql_connect(HOST,USER,PASSWORD) or die("Connection error");
$db_selected = mysql_select_db(DATABASE,$conn) or die(mysql_error(DATABASE));

?>