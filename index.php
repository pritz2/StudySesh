<?php 
if(!isset($_SESSION["id"])) {
header("Location:user_login_session.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>StudySesh</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>StudySesh</h1>
    <p>The hippest work collaboration tool around</p> 
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h3>Find Locations</h3>
      <p>Find locations near you known the be common study or work areas!</p>
      <a href='viewLocations.php'>View locations here!</a>
    </div>
    <div class="col-sm-4">
      <h3>Find Classmates</h3>
      <p>Look at who's at a location you want to study at so you can work together!</p>
    </div>
    <div class="col-sm-4">
      <h3>Check In</h3>        
      <p>When you start working, mark your location so others can find you!</p>
    </div>
  </div>
</div>

<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>