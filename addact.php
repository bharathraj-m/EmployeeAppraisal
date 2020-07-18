<?php



$message=$_SESSION['message1'];
$from1=$_SESSION['eid'];
date_default_timezone_set("Asia/kolkata");
$now=date("h:i:s");
$ampm=date("a");
$d= date("Y-m-d");
$query="INSERT INTO `activities`(`aid`, `msg`, `date1`, `time1`, `eid`,`ampm`) VALUES ('','$message','$d','$now','$from1','$ampm')";
$result = mysqli_query($conn, $query) or die("connection_aborted");

?>
