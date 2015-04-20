<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
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

        $result = mysql_query("SELECT buildingName,xcoor,ycoor FROM  Location");
        		
        while ($row = mysql_fetch_assoc($result)) {
           	echo "new google.maps.Marker({position: new google.maps.LatLng(".strval($row['xcoor']).",".$row['ycoor']."),map: map,title: '".$row['buildingName']."'});\n";
        }
        	    
        ?>
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
<div id="map-canvas"></div>
  </body>
</html>