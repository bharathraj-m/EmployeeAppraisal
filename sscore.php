<?php include('dbconnect.php');
session_start();
if(isset($_POST['submit1'])!="")
{
$h=$_POST['shard'];
$m=$_POST['smed'];
$l=$_POST['slow'];
$vl=$_POST['svlow'];
$vh=$_POST['svhard'];
$que="UPDATE extras set s_hard=$h,s_med=$m,s_low=$l,s_very_hard=$vh,s_very_low=$vl";
$res=mysqli_query($conn,$que);
if($res)
{
  $_SESSION['message1']="Updated Points awarded for Subtasks";
     include("addact.php");
  header("Location:control.php");
}
}
?>
