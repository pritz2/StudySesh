<?php 
session_start();
if(!isset($_SESSION["id"]) or !isset($_SESSION["locationID"])) {
header("Location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>StudySesh</title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/default.css" rel="stylesheet">
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

            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <?php if(isset($_SESSION["locationID"])) echo "<li><a href='at_location.php'>My Location</a></li>";?>
            <li><a href="include/logout.php">Logout</a></li>
          
          </ul>
        </div> </div> </div>
    <!-- navigation buttons ends -->

<div class="container">
  <div class="jumbotron">
    <h1>StudySesh</h1>
    <p>The hippest work collaboration tool around</p> 
  </div>
  <div class="row">
    <h3>Welcome to <?php echo $_SESSION['locationID'];?>!</h3>
  </div>
  <div class="row">
    <h3><a href="./include/leave_location.php">I'm done with this location.</a></h3>
  </div>
</div>

<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>