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
            <h3>Where you're checked in :</h3>
            <?php
            include_once '/include/db_connect.php';

            $sql1 = "SELECT locationID, classID FROM CheckIn WHERE studentID = '".$_SESSION["id"]."';";
            $result1 = mysql_query($sql1);

            if(mysql_num_rows($result1)==0){
                echo "You're not checked in!";
            }
            else{
                while ($row = mysql_fetch_assoc($result1)) {
                    echo "<p>".$row['locationID']." ".$row['classID']."</p>";
                }
            }
            ?>

            <h3>Buildings with most checked in right now:</h3>
            <?php
            include_once '/include/db_connect.php';

            $sql2 = "SELECT classID, Location, MAX(numStudents) AS numStudents FROM NumberAtBuildingForTaking
                    WHERE studentID = '".$_SESSION["id"]."' GROUP BY classID;";
            $result2 = mysql_query($sql2);

            if(mysql_num_rows($result2)==0){
                echo "You haven't added any classes!";
            }
            else{
                echo "<p>Class | Building | Number Checked In</p>";
                while ($row = mysql_fetch_assoc($result2)) {
                    echo "<p>".$row['classID']." ".$row['Location']." ".$row['numStudents']."</p>";
                }
            }
            ?>

            <h3>Recommended locations for classes you're taking :</h3>
            <?php
            include_once '/include/db_connect.php';
            $sql3 = "CALL recommend_for_student('".$_SESSION["id"]."');";
            $result3 = mysql_query($sql3);
            if(mysql_num_rows($result3)==0){
                echo "You haven't added any classes!";
            }
            else{
                echo "<h4>These are the recommended locations based on their past usage (number of visits/total time):</h4>";
                echo "<p>Class | Most Frequently Visited | Number of Visits | Longest Visited Building | Time at Building</p>";
                while ($row = mysql_fetch_assoc($result3)) {
                    echo "<p>".$row['Class']." ".$row['mostVisitedBuilding']." ".$row['visitsAtBuilding']." ".$row['mostTimeBuilding']." ".$row['timeAtBuilding']."</p>";
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