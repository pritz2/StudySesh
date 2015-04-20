<?php
session_start();
if(!isset($_SESSION["id"])) {
	header("Location:index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
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

            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
            <?php if(isset($_SESSION["locationID"])) echo "<li><a href='at_location.php'>My Location</a></li>";?>
            <li><a href="viewLocations.php">All Locations</a></li>
            <li><a href="recommend.php">Recommend</a></li>
            <li><a href="include/logout.php">Logout</a></li>
          
          </ul>
        </div> </div> </div>
    <!-- navigation buttons ends -->

<div class="container">
  <div class="jumbotron">
    <h1>Profile</h1>
  </div>
  <div class="row">
  	<h3>Your info:</h3>
  	<p>Name: <?php echo $_SESSION["name"];?></p>
  	<p>Student ID: <?php echo $_SESSION["id"];?></p>
  	<p>Major: <?php echo $_SESSION["major"];?></p>
  	<p>Year: <?php echo $_SESSION["year"];?></p>
    <?php 
    	include_once './include/db_connect.php';
    	
    	$sql = "SELECT Class.classID, Class.className, Class.teacher FROM Taking INNER JOIN Class ON Taking.classID = Class.classID WHERE Taking.studentID = '".$_SESSION["id"]."';";
    	$result = mysql_query($sql);
    	
    	if(mysql_num_rows($result)==0){
    		echo "You're not taking any classes!";
    	}
    	else{
    		echo "<p>Your classes:</p>";
    		while ($row = mysql_fetch_assoc($result)) {
    			echo "<p>".$row['classID'].": ".$row['className']." (".$row['teacher'].")</p>";
    		}
    	}
    ?>
  </div>
  <div class="row">
  	<h3 style="text-align:center">Add a class!</h3>
  	<form action="./include/add_class.php" method="post" class="form-btn" role="form">
		<select name="classID" class="form-control">
    	<?php 
    		include_once 'include/db_connect.php';
    		$sql = "SELECT * FROM Class;";
    		$result = mysql_query($sql);
    		
    		while ($row = mysql_fetch_assoc($result)) {
    			echo "<option value='".$row['classID']."'>".$row['classID'].": ".$row['className']." (".$row['teacher'].")</option>";
    		}
    	?>
    	</select>
    	<button class="btn btn-lg btn-primary btn-block" type="submit" name="registersubmit">Add Class!</button>
  	</form>
  </div>
</div>

<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>