<?php
session_start();
include('dbconnect.php');
$stid=$_REQUEST['filename'];
$query="UPDATE subtasks set status='completed'  WHERE stid='$stid'";
$result=mysqli_query($conn,$query);
if($result)
{
  echo "<script>alert('Accepted');</script>";
}

//project credit evaluation

$d= date("Y-m-d");
$query11="UPDATE subtasks set submitdate='$d' WHERE stid='$stid'";
$result1=mysqli_query($conn,$query11);


$query12="SELECT * from subtasks  WHERE stid='$stid'";
$result12=mysqli_query($conn,$query12);
$row12=mysqli_fetch_array($result12);
if(!empty($row12[0])){

$subd=$row12['submitdate'];
$end=$row12['enddate'];
$diff=$row12['difficulty'];
}


    $max="SELECT * from extras";
    $r=mysqli_query($conn,$max);
    $rowq=mysqli_fetch_array($r);
    if($diff=="very_low")
    	$cred=$rowq['s_very_low'];
    else if($diff=="low")
    	$cred=$rowq['s_low'];
    else if($diff=="medium")
    	$cred=$rowq['s_med'];
    else if($diff=="hard")
    	$cred=$rowq['s_hard'];
    else if($diff=="very_hard")
    	$cred=$rowq['s_very_hard'];


if ($subd>$end){
	$subd1 = strtotime($subd);
	$end1 = strtotime($end);
	$difference = $subd1 - $end1;
    $days = floor($difference / (60*60*24) );

    if($days>=10){
    	$cred=0;
    }else
    {
    	$cred=$cred-(($days*10*$cred)/100);

    }
}
else if($subd<$end)
{

    $subd1 = strtotime($subd);
	$end1 = strtotime($end);
	$difference = $end1 - $subd1;
	$days = floor($difference / (60*60*24) );
    if($days<=10){
    	$cred=$cred+(($days*10*$cred)/100);
    }
    else{
    	$cred=2*$cred;
    }

}
echo $diff;
echo $cred;
$query111="UPDATE subtasks set credits='$cred' WHERE stid='$stid'";
$result111=mysqli_query($conn,$query111);


//notification





$frm1=$_SESSION['eid'];
echo $frm1;
$query1="SELECT * from subtasks WHERE stid='$stid'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$to1=$row['eid'];
$sname=$row['sname'];
$pnno=$row['pno'];

$subject="Subtask Acceptance";
$message="Congratulations!!! Your subtask ".$sname."of Project No: ".$pnno." has been accepted!";

$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');
$_SESSION['sid']=$stid;

$_SESSION['message1']="You accepted the Subtask ".$sname."of Project NO:".$pnno;
   include("addact.php");

include('credits/credsub.php');

header('Location:mgrp.php');
?>
