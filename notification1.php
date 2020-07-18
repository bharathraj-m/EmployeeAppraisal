<?php


$subject=$_SESSION['subject'];
$message=$_SESSION['message'];
$from1=$_SESSION['from1'];
$to1=$_SESSION['to1'];
$d= date("Y-m-d");
$query="INSERT INTO `notification`(`nid`, `subject`, `message`, `from1`, `to1`,`date1`) VALUES ('','$subject','$message','$from1','$to1','$d')";
$result = mysqli_query($conn, $query) or die("connection_aborted");

?>

