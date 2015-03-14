<?php

	$user = 'root';
	$password = 'root';
	$host = 'localhost';
	$port = '8889';
	$db = 'studyses_db';

	$link = mysql_connect("$host:$port",$user,$password) or die("Connection error");
	$db_selected = mysql_select_db($db,$link) or die(mysql_error($db));

	$result = mysql_query("SELECT buildingName,xcoor,ycoor FROM  Location");

	if(mysql_num_rows($result) == 0){
		echo "Try again";
	}
	else{
		echo "It works";
	}
	
	while ($row = mysql_fetch_assoc($result)) {
    	echo $row['buildingName'];
    	echo $row['xcoor'];
    	echo $row['ycoor'];
	}
?>