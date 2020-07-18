<?php include('dbconnect.php');
session_start();
if(isset($_POST['submit'])!="")
{
$h=$_POST['phard'];
$que="UPDATE extras set cred_threshold=$h";
$res=mysqli_query($conn,$que);
if($res)
{
  $_SESSION['message1']="Updated Minimum threshold of Subtasks to consider for Promotion List";
     include("addact.php");
  header("Location:control.php");
}
}
if(isset($_POST['submit1'])!="")
{
$h=$_POST['phard'];
$que="UPDATE extras set min_cred=$h";
$res=mysqli_query($conn,$que);
if($res)
{
  $_SESSION['message1']="Updated Minimum threshold of SUbtasks to consider for Termination List";
     include("addact.php");
  header("Location:control.php");
}
}
?>
