<?php
session_start();
include('dbconnect.php');
$eid=$_REQUEST['filename'];
$query="SELECT email from employee WHERE eid='$eid'";
$result1=mysqli_query($conn,$query);
$row1=mysqli_fetch_array($result1);
$tomail=$row1['email'];
$query="DELETE from employee WHERE eid='$eid'";
$result=mysqli_query($conn,$query);
if($result)
{
  echo "<script>alert('Employee Removed!!');</script>";
  $to=$tomail;
  $s="Termination";
  $h="From:noreply@todo.com \r\n";
  $h .="MIME-Version:1.0\r\n";
  $h .="Content-Type:text/html\r\n";
  $m="Sorry,You have been terminated from your Organization. <br/> Best of Luck for Future.";
  $retval=mail($to,$s,$m,$h);



  $_SESSION['message1']="Terminated Employee of ID: \'".$eid."\' from Organization";
     include("addact.php");
}
header('Location:control.php');
?>
