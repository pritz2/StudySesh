<?php 
session_start();
if(!isset($_SESSION["id"])) {
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
            <li><a href="viewLocations.php">All Locations</a></li>
            <li><a href="recommend.php">Recommend</a></li>
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
    <div class="col-md-6">
      <h3 style="text-align: center">Check In</h3>        
      <p style="text-align: center">When you start working, mark your location so others can find you!</p>
      <?php if(!isset($_SESSION['locationID'])): ?>
      <form action=./include/checkIn.php method="post" class="form-btn" role="form">
      	<select name="classID" class="form-control">
      	<?php 
      		include_once 'include/db_connect.php';
      		$sql = "SELECT * FROM Taking WHERE studentID = '".$_SESSION["id"]."';";
      		$result = mysql_query($sql);
      		
      		while ($row = mysql_fetch_assoc($result)) {
      			echo "<option value='".$row['classID']."'>".$row['classID']."</option>";
      		}
      	?>
		</select>
		<select name="locationID" class="form-control">
  		<?php 
      		include_once 'include/db_connect.php';
      		$sql = "SELECT * FROM Location;";
      		$result = mysql_query($sql);
      		
      		while ($row = mysql_fetch_assoc($result)) {
      			echo "<option value='".$row['locationID']."'>".$row['buildingName']." room ".$row['roomNumber']."</option>";
      		}
      	?>
		</select>
    	<button class="btn btn-lg btn-primary btn-block" type="submit" name="registersubmit">Check In!</button>
  	  </form>
  	  <?php else: ?>
  	  <h4 style="text-align: center">You're currently checked into <?php echo $_SESSION['locationID']; ?>!</p>
  	  <h4 style="text-align: center"><a href="./include/leave_location.php">I'm done with this location.</a></h3>
  	  <?php endif ?>
    </div>
    <div class="col-md-6">
      <div class="row">
      	<h3 style="text-align: center"><a href='profile.php'>Profile</a></h3>
        <p style="text-align: center">Personalize your profile with your current classes!</p>
      </div>
      <div class="row">
      	<h3 style="text-align: center"><a href='viewLocations.php'>View Locations</a></h3>
        <p style="text-align: center">Find locations near you known the be common study or work areas!</p>
      </div>
      <div class="row">
        <h3 style="text-align: center"><a href='recommend.php'>Recommend for me</a></h3>
        <p style="text-align: center">Recommends the best locations for you!</p>
      </div>
    </div>
    
  </div>
</div>

<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>