<?php
session_start();
include('dbconnect.php');
if(isset($_POST['submit'])!="")
{
$pno=$_POST['phard'];
$sname=$_POST['pmed'];
$emp=$_POST['seid'];
$sdate=$_POST['stdate'];

$edate=$_POST['edate'];
$descr=$_POST['message'];
$pri = trim($_POST['pri']);
$pri = strip_tags($pri);
$pri = htmlspecialchars($pri);

$diff = trim($_POST['diff']);
$diff = strip_tags($diff);
$diff = htmlspecialchars($diff);

echo $pno;
echo $sname;
echo $emp;
$que="INSERT into subtasks (pno,sname,eid,startdate,enddate,description,priority,difficulty) values ('$pno','$sname','$emp','$sdate','$edate','$descr','$pri','$diff')";
$res=mysqli_query($conn,$que);
if($res)
{
	 $subject="Subtask Assignment";
$message="You have been assigned to a new subtask ".$sname." of Project No:".$pno;
$frm1=$_SESSION['eid'];


$to1=$emp;
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');

$_SESSION['message1']="Added new subtask to Project ".$sname." of Project No:".$pno;
   include("addact.php");

  header("Location:mgrp.php");
}
}
?>
