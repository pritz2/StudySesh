<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location:recommend.php");
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

                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <?php if(isset($_SESSION["locationID"])) echo "<li><a href='at_location.php'>My Location</a></li>";?>
                    <li><a href="viewLocations.php">All Locations</a></li>
                    <li class="active"><a href="recommend.php">Recommend</a></li>
                    <li><a href="include/logout.php">Logout</a></li>

                </ul>
    </div> </div> </div>
    <!-- navigation buttons ends -->

    <div class="container">
        <div class="jumbotron">
            <h1>Recommended Location</h1>
        </div>
        <div class="row">
            <h3>Currently checked in :</h3>
            <?php
            include_once './include/db_connect.php';
            $sql = "SELECT locationID, classID FROM CheckIn WHERE studentID = '".$_SESSION["id"]."';";
            $result = mysql_query($sql);

            if(mysql_num_rows($result)==0){
                echo "You're not checked in!";
            }
            else{
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<p>".$row['locationID']." ".$row['classID']."</p>";
                }
            }
            ?>
        </div>
        <div class="row">
            <h3>Recommended location :</h3>
            <?php
            include_once './include/db_connect.php';
            $sql = "CALL recommended_classes('".$_SESSION["classID"]."')";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)==0){
                echo "You're not checked in!";
            }
            else{
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<p>".$row['Location']."</p>";
                }
            }
            ?>
        </div>
    </div>


<!-- Scripts at bottom so page loads faster -->
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>