<?php
session_start();
if(isset($_SESSION["id"])) {
	header("Location:dashboard.php");
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

            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="sign_up.php">Sign Up</a></li>
          
          </ul>
        </div> </div> </div>
    <!-- navigation buttons ends -->

<div class="container">
  <div class="jumbotron">
    <h1>StudySesh</h1>
    <p>The hippest work collaboration tool around</p> 
  </div>
      
  <form action="./include/user_login_session.php" method="post" class="form-btn" role="form">
    <input name="studentID" type="studentID" class="form-control" placeholder="Student ID" required autofocus>
    <input name="password" type="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="loginsubmit">Login</button>
  </form>

  <form action="sign_up.php" method="post" class="form-btn" role="form">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
  </form>

</div>

<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>