<?php include('dbconnect.php');
session_start();
if(isset($_POST['submit'])!="")
{
$vh=$_POST['p_very_hard'];
$h=$_POST['phard'];
$m=$_POST['pmed'];
$l=$_POST['plow'];
$vl=$_POST['p_very_low'];
$que="UPDATE extras set p_hard=$h,p_med=$m,p_low=$l,p_very_hard=$vh,p_very_low=$vl";
$res=mysqli_query($conn,$que);
if($res)
{
  $_SESSION['message1']="Updated Points awarded for Projects";
     include("addact.php");
  header("Location:control.php");
}
}
?>
