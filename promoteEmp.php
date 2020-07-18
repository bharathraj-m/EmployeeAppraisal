<?php
session_start();
include('dbconnect.php');
$eid=$_REQUEST['filename'];
$a=1;
$query="UPDATE employee set proj_mgr='$a' WHERE eid='$eid'";
$result=mysqli_query($conn,$query);

$query="SELECT email from employee WHERE eid='$eid'";
$result1=mysqli_query($conn,$query);
$row1=mysqli_fetch_array($result1);
$tomail=$row1['email'];



if($result)
{
  $subject="Promotion";

  $frm1=$_SESSION['eid'];

  $message="<b>Congratulations!!<br/>You have been promoted as the Project Manager.</b>";
  $to1=$eid;
  $_SESSION['subject']=$subject;
  $_SESSION['message']=$message;
  $_SESSION['from1']=$frm1;
  $_SESSION['to1']=$to1;
  include('notification.php');

  $to=$tomail;
  $s="Termination";
  $h="From:noreply@todo.com \r\n";
  $h .="MIME-Version:1.0\r\n";
  $h .="Content-Type:text/html\r\n";
  $m="<b>Congartulations!! <br/>You have been Promoted as Project Manager. <br/> Best of Luck for Future.</b>";
  $retval=mail($to,$s,$m,$h);

  $_SESSION['message1']="Promoted Employee \'".$eid."\' as Project Manager";
     include("addact.php");

}
header('Location:control.php');
?>
