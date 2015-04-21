<?php 
session_start();
if(!isset($_SESSION["id"])) {
header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>StudySesh</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding-top: 25px;}
    </style>
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlE0swiUZyFXG28qgwfLfYxow5WsvbqHA">
    </script>
    
    <script type="text/javascript">
      function initialize() {
    	var centerLatlng = new google.maps.LatLng(40.1125,-88.2269);
        var mapOptions = {
          center: centerLatlng,
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        <?php 
        include_once 'include/db_connect.php';

        $result = mysql_query("SELECT locationID,buildingName,xcoor,ycoor FROM  Location");
        		
        while ($row = mysql_fetch_assoc($result)) {
        	$subrow = mysql_fetch_assoc(mysql_query("SELECT COUNT(studentID) AS cnt FROM CheckIn WHERE locationID = '".$row['locationID']."';"));
        	echo "var infowindow".$row['locationID']." = new google.maps.InfoWindow({content: '<p>".$row['locationID']."</p><p>".$subrow['cnt']." students studying here now.</p><a href=dashboard.php>Check in here!</a>'});\n";
           	echo "var marker".$row['locationID']." = new google.maps.Marker({position: new google.maps.LatLng(".strval($row['xcoor']).",".$row['ycoor']."),map: map,title: '".$row['locationID']."'});\n";
           	echo "google.maps.event.addListener(marker".$row['locationID'].", 'click', function() {infowindow".$row['locationID'].".open(map,marker".$row['locationID'].");});\n";
        }
        	    
        ?>
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
	<!-- navigation buttons starts -->   
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> <div class="container"> <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="">StudySesh</a> </div><div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <?php if(isset($_SESSION["locationID"])) echo "<li><a href='at_location.php'>My Location</a></li>";?>
            <li class="active"><a href="viewLocations.php">All Locations</a></li>
            <li><a href="recommend.php">Recommend</a></li>
            <li><a href="include/logout.php">Logout</a></li>
          
          </ul>
        </div> </div> </div>
    <!-- navigation buttons ends -->
	<div id="map-canvas"></div>
  </body>
</html>